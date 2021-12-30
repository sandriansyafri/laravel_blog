<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('page.frontend.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string'
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }

        return back()->with('loginErrors', 'Email / Password is wrong!');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();;
        request()->session()->regenerateToken();
        return redirect()->route('login');
    }
}
