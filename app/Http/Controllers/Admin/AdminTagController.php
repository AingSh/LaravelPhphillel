<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(5);

        return view('admin/tag/index', compact('tags'));
    }

    public function trash()
    {
        $tags = Tag::onlyTrashed()->get();
        return view('admin/tag/trash', compact('tags'));
    }

    public function restore($id)
    {
        Tag::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('admin.tag.trash');
    }

    public function show($id)
    {
        $tag = Tag::find($id);
        return view('admin/tag/show', compact('tag'));
    }

    public function create()
    {
        return view('admin/tag/create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'slug' => ['required'],
        ]);

        Tag::create($request->all());
        return redirect()->route('admin.tag');

    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin/tag/edit', compact('tag'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255']
        ]);

        $tag = Tag::find($request->input('id'));
        $tag->update($request->all());
        return redirect()->route('admin.tag');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return redirect()->route('admin.tag');
    }

    public function forceDelete($id)
    {
        $tag = Tag::onlyTrashed()->where('id', $id)->first();
        foreach ($tag->posts as $post) {
            $post->tags()->detach();
        }
        $tag->forceDelete();
        return redirect()->route('admin.tag.trash');

    }
}
