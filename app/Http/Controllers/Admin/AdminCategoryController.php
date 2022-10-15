<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin/category/index', compact('categories'));
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin/category/trash', compact('categories'));
    }

    public function restore($id)
    {
        Category::withTrashed()
            ->where('id', $id)
            ->restore();
        return redirect()->route('admin.category.trash');
    }

    public function create()
    {
        return view('admin/category/create');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('admin/category/show', compact('category'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'slug' => ['required'],
        ]);

        Category::create($request->all());
        return redirect()->route('admin.category');

    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin/category/edit', compact('category'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255']
        ]);

        $category = Category::find($request->input('id'));
        $category->update($request->all());
        return redirect()->route('admin.category');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category');
    }

    // не працюэ
//    public function forceDelete($id)
//    {
//        $category = Category::onlyTrashed()->where('id', $id)->first();
//        foreach ($category->posts as $post) {
//            $post->tags()->detach();
//            $post->forceDelete();
//        }
//        $category->forceDelete();
//        return redirect()->route('admin.category');
//    }

}
