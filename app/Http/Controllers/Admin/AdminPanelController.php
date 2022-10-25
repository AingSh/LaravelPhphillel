<?php

namespace App\Http\Controllers\Admin;

class AdminPanelController
{
    public function index()
    {

        return view('admin/welcome');
    }
}
