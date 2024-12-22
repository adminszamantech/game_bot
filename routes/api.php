<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\UserController;
use Illuminate\Support\Facades\Hash;

Route::post('/user-register', [UserController::class, 'user_register']);
Route::post('/user-login', [UserController::class, 'user_login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth-check',[UserController::class,'auth_check']);
});
