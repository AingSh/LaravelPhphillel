<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);

        return view('admin/post/index', compact('posts'));
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin/post/trash', compact('posts'));
    }


    public function restore($id)
    {
        Post::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('admin.post');
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('admin/post/show', compact('post'));
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin/post/create', compact('post', 'categories', 'users', 'tags'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'min:3', 'max:15'],
            'body' => ['required'],
            'category_id' => ['exists:categories,id'],
            'user_id' => ['exists:users,id'],
        ]);

        $post = Post::create($request->all());
        $post->tags()->attach($request->input('tags'));
        return redirect()->route('admin.post');

    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();

        return view('admin/post/edit', compact('post', 'categories', 'users', 'tags', 'id'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
            'tags_id' => ['required'],
            'category_id' => ['required'],
            'title' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2', 'max:255']
        ]);

        $post = Post::find($request->input('id'));
        $post->update($request->all());
        $post->tags()->sync($request->tags_id);
        return redirect()->route('admin.post');
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        return redirect()->route('admin.post');
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        $post->tags()->detach();
        $post->forceDelete();
        return redirect()->route('admin.post.trash');

    }
}
