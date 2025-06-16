<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request)
    {
        $token = $request->query('token');
        $email = $request->query('email');

        if (!$token || !$email || !Password::tokenExists(app('auth')->createUserProvider('users')->retrieveByCredentials(['email' => $email]), $token)) {
            return redirect()->route('user.forgot-password');
        }

        return view('recovery-password', ['token' => $token, 'email' => $email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

    // $status = Password::reset(
        //     $request->only('email'),
        //     function ($user, $password) {
        //         $user->forceFill([
        //             'password' => Hash::make($password),
        //             'remember_token' => Str::random(60),
        //         ])->save();
        //     }
        // );

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                    'remember_token' => Str::random(60),
                ])->save();
            }
        );

        return $status == Password::PASSWORD_RESET
            ? redirect()->route('user.login')->with('status', __($status))
            : back()->withErrors([
                'email' => [__($status)]
            ]);
    }
}
