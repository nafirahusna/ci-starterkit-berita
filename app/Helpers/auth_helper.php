<?php

if (!function_exists('user')) {
    function user()
    {
        if (!session()->get('isLoggedIn')) {
            return null;
        }

        return (object)[
            'id'    => session()->get('user_id'),
            'name'  => session()->get('user_name'),
            'email' => session()->get('user_email'),
            'role'  => session()->get('role_id'),
        ];
    }
}

if (!function_exists('in_groups')) {
    function in_groups($roles)
    {
        if (!session()->get('isLoggedIn')) {
            return false;
        }

        $currentRole = session()->get('role_id');

        if (is_array($roles)) {
            return in_array($currentRole, $roles);
        }

        return $currentRole == $roles;
    }
}
