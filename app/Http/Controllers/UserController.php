<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Pagination\Paginator;


class UserController
{
    public function index()
    {
//        $users = User::paginate(25);
        $users = User::with(['posts', 'posts.tags'])->get();
        return view('user/index2', compact('users'));
    }

    public function posts($id)
    {
        $user = User::find($id);
        $posts = $user->posts;
        return view('user/posts', compact('user', 'posts'));
    }

    public function categories($id, $category_id)
    {
        $posts = Post::where('category_id', '=', $category_id)->where('user_id', '=', $id)->get();
        return view('user/categories', compact('posts', 'category_id'));
    }


    public function categoryTags($id, $category_id, $tag_id)
    {
        $tag = Tag::find($tag_id);
        $posts = Post::whereHas('tags', function ($tag) use ($tag_id) {
            $tag->where('tag_id', $tag_id);
        })->where('category_id', '=', $category_id)->where('user_id', '=', $id)->get();
        return view('user/categoryTags', compact('posts','tag'));
    }

}
