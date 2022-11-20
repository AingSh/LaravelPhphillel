<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController
{


    public function createToken(Request $request)
    {
        $request->validate([
            'email' => ['email', 'required', 'exists:users'],
            'password' => ['required', 'min:5'],
            'device_name' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password,$user->password)) {
            throw ValidationException::withMessages('Не валидные данные');
        }
        return $user->createToken($request->device_name)->plainTextToken;
    }
    //2|MAJ4WSwuKs6t7Cs6pJ80De3p5PQ7aUE4PDAHObao
}
