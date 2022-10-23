<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class TagController
{

//    public function posts(Tag $tag)
    public function posts()
    {
        $posts = Post::with(['tags'])->get();
        return view('tag/posts', compact( 'posts'));
    }

}
