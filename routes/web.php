<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', fn() => redirect()->route(Auth::check() ? 'dashboard' : 'login'));
Route::match(['get','post'],'/login', [AuthController::class, 'login'])->name('login');
Route::match(['get','post'],'/forgot-password', [AuthController::class, 'forgot_password'])->name('forgotPassword');
Route::match(['get','post'],'/reset-password', [AuthController::class, 'reset_password'])->name('resetPassword');
Route::middleware(['admin'])->group(function () {
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    Route::resource('users',UserController::class);
    Route::get('users-status/{user}', [UserController::class, 'status']);



    Route::match(['get','post'],'/change-password', [AuthController::class, 'change_password'])->name('changePassword');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});
