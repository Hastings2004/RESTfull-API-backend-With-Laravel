<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login(Request $request){
        $field = $request->validate([
            'email'=> 'required|max:255|email|exists:users',
            'password'=> 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return [
                'errors'=> [
                    'email'=> [
                        'Invalid credentials'
                    ]
                ]
            ];
        }

        $token = $user -> createToken($user -> name) ;
        
        return [
            'user'=> $user,
            'token'=> $token -> plainTextToken,
        ];
    }
    public function register(Request $request){
        $field = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|max:255|email|unique:users',
            'student_id'=> 'required|alpha_num|unique:users|uppercase|min:7',
            'password'=> 'required|confirmed|min:6',
        ]);

        $user = User::create($field);

        $token = $user -> createToken($request-> name);

        Auth::login();

        return [
            'user'=> $user,
            'token'=> $token -> plaintextToken,
        ];

    }

    public function logout(Request $request){
        $request -> user() -> tokens() -> delete();

        return [
            'message'=> 'your logout'    
        ];

                
    }
}
