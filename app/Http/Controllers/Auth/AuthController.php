<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController
{
    public function login()
    {
        $url = 'https://github.com/login/oauth/authorize';
        $params = [
            'client_id' => getenv('OAUTH_GITHUB_CLIENT_ID'),
            'redirect_uri' => getenv('OAUTH_GITHUB_REDIRECT_URI'),
            'scope' => 'user'
        ];

        $url .= '?' . http_build_query($params);
        return view('auth/form', compact('url'));
    }

    public function handleLogin(Request $request)
    {
        $data = $request->validate([
            'email' => ['email', 'required', 'exists:users'],
            'password' => ['required', 'min:5'],
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if (Hash::needsRehash($user->password)) {
                $user->password = Hash::make($data['password']);
                $user->save();
            }
            return redirect()->route('admin.panel');
        }
        return back()->withErrors([
            'email' => 'Error',
            'password' => 'Error'
        ]);
    }


    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('main');
    }
}

