<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status'  => 404,
                'message' => 'User not found.'
            ]);
        }
    
        if ($request->password != $user->password) {
            return response()->json([
                'status'  => 404,
                'message' => 'Invalid credentials'
            ]);
        }
        
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('User-Token')->plainTextToken
        ]);
    }
}
