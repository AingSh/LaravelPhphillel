<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostCollection;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return new  PostResource(Post::orderByDesc('category_id')->first());
    }

    public function all()
    {
        return new PostCollection(Post::paginate(5));
    }
}

