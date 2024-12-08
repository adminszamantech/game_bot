<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');

            }
            return redirect()->route('login')->with('error','Invalid Credentials');
        }
        return Auth::check() && Auth::user()->role === 'admin' ? redirect()->route('dashboard') : Inertia::render('Login');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with("message","Logout Successfully");
    }
}
