<?php namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        helper('form');
        return view('auth/login', ['title'=>'Login']);
    }

    public function attempt()
    {
        $session = session();
        $rules = [
            'email'    => 'required|valid_email',
            'password' => 'required'
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $user  = $model->where('email', $this->request->getPost('email'))->first();
        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            $session->set([
                'isLoggedIn' => true,
                'user_id'    => $user['id'],
                'role_id'    => $user['role_id'],
                'user_name'  => $user['name'],
                'email'      => $user['email'],
            ]);
            return redirect()->to('/');
        }
        return redirect()->back()->withInput()->with('error', 'Email or Password incorrect');
    }

    public function register()
    {
        helper('form');
        return view('auth/register', ['title'=>'Register']);
    }

    public function store()
    {
        $rules = [
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ];
        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();
        $model->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id'  => 3  // default role = wartawan
        ]);
        return redirect()->to('/login')->with('message', 'Registration successful, please login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
