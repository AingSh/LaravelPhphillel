<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);


        return view('admin/post/index', compact('posts'));

    }



    public function create()
    {
        $post = new Post();
        $categories = Category::all();
        $tags = Tag::all();
        return view('post/create', compact('post', 'categories', 'tags'));
    }

//    public function store()
//    {
//        $data = request()->all();
//
//        $validator = validator()->make($data, [
//            'title' => ['required', 'min:3', 'max:15'],
//            'slug' => ['required'],
//            'category_id' => ['exists:categories,id'],
//            'tags' => ['required', 'exists:tags,id']
//        ]);
//
//        if ($validator->fails()) {
//            $_SESSION['errors'] = $validator->errors()->toArray();
//            $_SESSION['data'] = $data;
//            return new RedirectResponse($_SERVER['HTTP_REFERER']);
//        }
//
//        $post = new Post();
//        $post->title = $data['title'];
//        $post->slug = $data['slug'];
//        $post->body = $data['body'];
//        $post->category_id = $data['category_id'];
//        $post->save();
//        $post->tags()->attach($data['tags']);
//
//        $_SESSION['success'] = 'Запис успішно додано!';
//        return new  RedirectResponse('/post');
//
//    }
//
//    public function edit($id)
//    {
//        $post = Post::find($id);
//        $categories = Category::all();
//        $tags = Tag::all();
//        return view('post/update', compact('categories', 'post', 'tags'));
//    }
//
//    public function update()
//    {
//        $data = request()->all();
//
//        $post = Post::find($data['id']);
//        $post->title = $data['title'];
//        $post->slug = $data['slug'];
//        $post->body = $data['body'];
//        $post->category_id = $data['category_id'];
//
//        $validator = validator()->make($data, [
//            'title' => ['required',
//                'min:2',
//                'max:30',
//                Rule::unique('tags', 'title')->ignore($post->id)],
//            'slug' => ['required', 'min:2', 'max:30'],
//            'tags' => ['required', 'exists:tags,id']
//        ]);
//
//
//        if ($validator->fails()) {
//            $_SESSION['errors'] = $validator->errors()->toArray();
//            $_SESSION['data'] = $data;
//            return new RedirectResponse($_SERVER['HTTP_REFERER']);
//        }
//
//        $post->save();
//        $post->tags()->sync($data['tags']);
//
//        $_SESSION['success'] = 'Запис успішно змінено!!';
//        return new  RedirectResponse('/post');
//    }
//
//    public function destroy($id)
//    {
//        $post = Post::find($id);
//        $post->tags()->detach();
//        $post->delete();
//        return new  RedirectResponse('/post');
//    }
}
