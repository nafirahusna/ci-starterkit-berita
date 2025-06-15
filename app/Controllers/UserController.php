<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;

class UserController extends BaseController
{
    protected $user, $role;

    public function __construct()
    {
        $this->user = new UserModel();
        $this->role = new RoleModel();
    }

    public function index()
    {
        $users = $this->user
            ->select('users.*, roles.name AS role_name')
            ->join('roles','roles.id=users.role_id')
            ->findAll();

        return view('users/index', [
            'users' => $users,
            'title' => 'Users'
        ]);
    }

    public function create()
    {
        return view('users/form', [
            'roles' => $this->role->findAll(),
            'title' => 'Create User'
        ]);
    }

    public function store()
    {
        $data = [
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id'  => $this->request->getPost('role_id'),
        ];
        $this->user->save($data);
        return redirect()->to('/users')->with('message','User created');
    }

    public function edit($id)
    {
        return view('users/form', [
            'user'  => $this->user->find($id),
            'roles' => $this->role->findAll(),
            'title' => 'Edit User'
        ]);
    }

    public function update($id)
    {
        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'role_id' => $this->request->getPost('role_id'),
        ];
        $pwd = $this->request->getPost('password');
        if ($pwd) {
            $data['password'] = password_hash($pwd, PASSWORD_DEFAULT);
        }
        $this->user->update($id, $data);
        return redirect()->to('/users')->with('message','User updated');
    }

    public function delete($id)
    {
        $this->user->delete($id);
        return redirect()->to('/users')->with('message','User deleted');
    }
}
