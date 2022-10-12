<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\Paginator;


class UserController
{
    public function index()
    {

        $users = User::paginate(25);
        return view('user/index', compact('users'));
    }

    public function posts($id)
    {
        $user = User::find($id);
        $posts = $user->posts;
        return view('user/posts', compact('user', 'posts'));
    }

    public function categories($id, $category_id)
    {
        $posts = Post::where('category_id', '=' , $category_id )->where('user_id', '=' , $id)->get();
        return view('user/categories', compact('posts','category_id'));
    }
}
