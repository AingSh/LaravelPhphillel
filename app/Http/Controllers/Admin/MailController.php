<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use App\Jobs\FirstEmail;

class MailController extends Controller
{

    public function index(){
        FirstEmail::dispatch('test dispatch and message!');
    }

//Mail::to('some@test.com')->send(new WelcomeMail('SanekEbanarot'));
}
