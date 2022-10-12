<?php

namespace Hillel\Controllers;


use Hillel\Models\Category;
use Hillel\Models\Post;
use Hillel\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class PostController
{
    public function index()
    {
        $posts = Post::all();
        return view('post/index', compact('posts'));
    }

}
