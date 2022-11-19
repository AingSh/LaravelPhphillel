<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\Agents;
use App\Models\Agent;
use donatj\UserAgent\UserAgentInterface;


class AgentIpController extends Controller
{

    public function index(UserAgentInterface $userAgent)
    {
        $browser = $userAgent->browser();
        $os = $userAgent->platform();
        Agents::dispatch($os,$browser)->onQueue('parsing');
    }


}

