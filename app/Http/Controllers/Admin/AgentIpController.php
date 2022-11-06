<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use donatj\UserAgent\UserAgentInterface;


class AgentIpController extends Controller
{

    public function index(UserAgentInterface $userAgent)
    {
        $browser = $userAgent->browser();
        $os = $userAgent->platform();

        Agent::create([
            'os' => $os,
            'browser' => $browser,
        ]);
    }

}

