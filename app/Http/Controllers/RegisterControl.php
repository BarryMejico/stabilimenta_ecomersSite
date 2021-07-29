<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class RegisterControl extends Controller
{
        public function register(request $REQUEST)
        {
            $REQUEST->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:5', 'confirmed'],
            ]);

            User::create([
                'name' => $REQUEST['name'],
                'email' => $REQUEST['email'],
                'password' => Hash::make($REQUEST['password']),
            ]);
        } 

        public function login(request $REQUEST)
        {
            $REQUEST->validate([
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'string', 'min:5'],
            ]);

        if (Auth::Attempt($REQUEST->only('email','password'))){
            return response()->json(Auth::User(),200);
        }
        throw ValidationException::withmessages([
                'email'=>['Incorrecr Credentials!']
        ]);
    } 
}
