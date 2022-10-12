<?php

namespace App\Http\Controllers;



use App\Models\Category;
use App\Models\Tag;

class TagController
{

    public function posts(Tag $tag)
    {
        $posts = $tag->posts;
        return view('tag/posts', compact( 'posts','tag'));
    }

}
