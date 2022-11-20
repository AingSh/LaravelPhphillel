<?php

namespace App\Jobs;

use donatj\UserAgent\UserAgentInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Agent;

class Agents implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $os;
    public $browser;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $os, string $browser)
    {
        $this->os = $os;
        $this->browser = $browser;
    }
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(UserAgentInterface $userAgent)
    {
        $os = $userAgent->platform();
        $browser = $userAgent->browser();

        Agent::create([
            'os' => $os,
            'browser' =>  $browser,
        ]);
    }
}
