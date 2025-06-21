<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        ]);

        $remember = $request->has('remember_me');

        // $user = User::where('email', $request->email)->first();

        if (Auth::attempt($validated, $remember)) {
            return redirect()->route('dashboard');
        }

        return back()->with([
            'error' => 'Failed to login, Invalid Credentials.',
        ]);
    }

    public function actionLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
