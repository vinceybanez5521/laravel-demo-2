<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    public function login(Request $request) {
        $validated = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ]);

        $user = User::where('email', $validated['email'])->first();
        
        // Check if user exists and password is correct
        if(!$user || !Hash::check($validated['password'], $user->password)) {
            return response('Invalid Credentials', 401);
        }

        // Generate token - will be used to login in API
        $token = $user->createToken('myapptoken')->plainTextToken;

        return response(
            [
                'user' => $user,
                'token' => $token,
                'message' => 'Login Successful!',
            ], 
            200
        );
    }

    public function logout(Request $request) {
        $request->user()->tokens()->delete();

        return response('Logout Successful!', 200);
    }
}
