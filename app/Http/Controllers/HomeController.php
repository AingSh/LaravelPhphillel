<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;


class HomeController
{
    public function index()
    {
        $posts = Post::all();
        return view('index', compact('posts'));
    }
}
