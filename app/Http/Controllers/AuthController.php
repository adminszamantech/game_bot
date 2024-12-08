<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        if($request->isMethod('post')){
            $credentials = $request->only('email','password');
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('dashboard')->with('success','Successfully Login');
            }
            return redirect()->route('login')->with('error','Invalid Credentials');
        }
        return Auth::check() && Auth::user()->role === 'admin' ? redirect()->route('dashboard') : Inertia::render('Login');
    }
    public function logout(){
        Auth::logout();
        return Inertia::location(route('dashboard'));
    }
}
