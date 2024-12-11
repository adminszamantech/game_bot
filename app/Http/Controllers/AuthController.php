<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendForgotPasswordOtpJob;

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
                return redirect()->intended('/dashboard')->with('success','Login Successfully');
            }
            return Inertia::render('Login', [
                'errors' => ['email' => 'Login failed. Please check your credentials']
            ]);
        }
        return Auth::check() && Auth::user()->role === 'admin' ? redirect()->route('dashboard') : Inertia::render('Login');
    }
    public function forgot_password(Request $request){
        if($request->isMethod('post')){
            $user = User::whereEmail($request->email)->first();
            if($user){
                $user->otp = random_int(100000, 999999);
                $user->save();
                $email = $user->email;
                $name = $user->name;
                $otp = $user->otp;
                dispatch(new SendForgotPasswordOtpJob($email,$name,$otp));
                return redirect()->route('resetPassword')->with('success','OTP Sent to Your Email');
            }
            return Inertia::render('ForgotPassword', [
                'errors' => ['otp' => "Try Again! Email Doesn't Match"]
            ]);
        }
        return Inertia::render('ForgotPassword');
    }
    public function reset_password(Request $request){
        if($request->isMethod('post')){
            $user = User::whereOtp($request->otp)->first();
            if($user){
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->route('login')->with('success','Password Reset Successfully');
            }
            return Inertia::render('ResetPassword', [
                'errors' => ['otp' => "Try Again! Invalid OTP"]
            ]);
        }
        return Inertia::render('ResetPassword');
    }
    public function change_password(Request $request){
        if($request->isMethod('post')){
           $user = User::find(Auth::id());
           if(Hash::check($request->currentPassword, $user->password)){
                $user->password = Hash::make($request->newPassword);
                $user->save();
                return redirect()->route('dashboard');
           }
           return Inertia::render('ChangePassword',[
                'errors' => ['password' => "Try Again! Password Doesn't Match"]
           ]);
        }
        return Inertia::render('ChangePassword');
    }
    public function logout(){
        Auth::logout();
        return Inertia::location(route('login'));
    }
}
