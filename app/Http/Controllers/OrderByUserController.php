<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\Paginator;


class OrderByUserController
{

    public function __invoke($id)
    {
        $user = User::find($id);
        $posts = $user->posts()->paginate(15);
        echo view('user/posts', compact('user', 'posts'));
    }

}
