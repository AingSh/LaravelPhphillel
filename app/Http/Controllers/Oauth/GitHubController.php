<?php

namespace App\Http\Controllers\Oauth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Exception;

class GitHubController
{
    public function __invoke()
    {

        $url = 'https://github.com/login/oauth/access_token';
        $params = [
            'client_id' => config()->get('services.github.client_id'),
            'client_secret' => config()->get('services.github.client_secret'),
            'redirect_uri' => config()->get('services.github.redirect'),
            'code' => request()->input('code')
        ];

        $url .= '?' . http_build_query($params);
        $response = Http::post($url);

        if (!$response->ok()) {
            throw new Exception('error');
        }
        //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
        $data = [];
        parse_str($response->body(), $data);

        if (!isset($data['access_token'])) {
            return redirect()->route('auth.login');
        }


        $user = Http::withHeaders([
            'Authorization' => 'Bearer ' . $data['access_token'],
            'X-Second' => 'bar'
        ])->get('https://api.github.com/user');
        if (!$this->createUser($user->json())) {
            return redirect()->route('auth.login');
        }
        return redirect()->route('admin.panel');
    }


    /**
     * @param array $userInfo
     * @return bool
     */

    protected function createUser(array $userInfo): bool
    {
        if (!isset($userInfo['email'])) {
            return false;
        }
        $user = User::where('email', $userInfo['email'])->first();
        if (empty($user)) {
            $user = User::create([
                'name' => $userInfo['name'],
                'email' => $userInfo['email'],
                'role_name' => 'customer',
                'password' => Hash::make($userInfo['id'] . '_' . $userInfo['node_id']),
            ]);
        }

        Auth::login($user);
        return true;
    }


}
