<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (!$request->email) {
            return response()->json([
                'status'  => 422,
                'message' => 'email is required'
            ]);
        }
        
        if(strlen($request->email) < 6) {
            return response()->json([
                'status'  => 422,
                'message' => 'email is invalid'
            ]);
        }
    
        if (!$request->password) {
            return response()->json([
                'status'  => 422,
                'message' => 'password is required'
            ]);
        }
        if(strlen($request->password) < 8) {
            return response()->json([
                'status'  => 422,
                'message' => 'password is invalid'
            ]);
        }
    
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json([
                'status'  => 404,
                'message' => 'Model not found.'
            ]);
        }
    
        if (Hash::check($request->password, $user->password)) {
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
