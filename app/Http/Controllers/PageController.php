<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Page;
use http\Env\Request;

class PageController
{


    public function index()
    {
        $pages = Page::all();
        return view('pages/index', compact('pages'));

    }

    public function show($id)
    {
        $page = Page::find($id);
        return view('pages/show', compact('page'));
    }

    public function addComment(\Illuminate\Http\Request $request, $id)
    {
        $request->validate([
            'body' => [
                'required',
                'min:5'
            ]
        ]);

        $page = Page::find($id);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $page->comments()->save($comment);


        return redirect()->route('page.show', ['id' => $page->id]);
    }
}
