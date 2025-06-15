<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // argument[0] = nama role yang diizinkan, misal 'admin'
        $requiredRole = $arguments[0] ?? null;
        $userRoleId  = session()->get('role_id');

        // kita ambil role name dari DB
        $db = \Config\Database::connect();
        $role = $db->table('roles')->where('id', $userRoleId)->get()->getRow();

        if (! $role || $role->name !== $requiredRole) {
            // jika bukan, redirect atau show 403
            return redirect()->to('/')->with('error','Access denied');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // nothing
    }
}
