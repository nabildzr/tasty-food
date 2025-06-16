<?php

use Illuminate\Support\Facades\Auth;

if (! function_exists('user_can')) {
    function user_can($permission)
    {
        $user = Auth::user();
        if (! $user) {
            return false;
        }

        // Super admin always true
        if ($user->role && $user->role->name === 'Super Admin') {
            return true;
        }

        // Cek permission di role
        return $user->role && $user->role->$permission;
    }
}
