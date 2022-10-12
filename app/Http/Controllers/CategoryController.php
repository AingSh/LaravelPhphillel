<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Pagination\Paginator;

class CategoryController
{


    public function categories(Category $category)
    {
        $posts = $category->posts;
        return view('category/posts', compact('category', 'posts'));
    }


}
