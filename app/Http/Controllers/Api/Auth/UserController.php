<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class UserController extends Controller
{

    public function user_register(RegisterRequest $request)
    {
        $user = User::create($request->validated());
        if($user){
             return response()->json([
                'message' => 'Registraion Successfully',
                'token' => $this->createToken($user),
                'user' => $user,
            ], 200);
        }
        return response()->json([
            'message' => 'Registraion Faild! Try Again',
        ], 422);
    }
    public function user_login(LoginRequest $request){
            $user = User::wherePhone($request->phone)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'Login Faild! Try Again With Valid Credentials',
                ], 401);
            }
            return response()->json([
                'message' => 'Login Successfully',
                'token' => $this->createToken($user),
                'user' => $user,
            ], 200);
    }
    public function createToken($user){
        return $token = $user->createToken('api_token')->plainTextToken;
    }
}
