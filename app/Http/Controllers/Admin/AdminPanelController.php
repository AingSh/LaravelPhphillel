<?php

namespace App\Http\Controllers\Admin;

class AdminPanelController
{
    public function index()
    {
//        $user = request()->user();
////        dd($user);
        return view('admin/welcome');
    }
}
