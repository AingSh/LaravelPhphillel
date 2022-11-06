<?php

namespace App\Services\Geo;

use donatj\UserAgent\UserAgentInterface;
use Illuminate\Support\Facades\Http;
use GeoIp2\Database\Reader;
use donatj\UserAgent\UserAgentParser;

class UserAgentService implements UserAgentInterface
{

    protected $userAgent;

    public function __construct()
    {
        $this->userAgent = new UserAgentParser();
        $this->userAgent = $this->userAgent->parse();
    }

    public function browser(): ?string
    {
        return $this->userAgent->browser();
    }

    public function platform(): ?string
    {
        return $this->userAgent->platform();
    }

    public function browserVersion(): ?string
    {
        return $this->userAgent->browserVersion();
    }
}
