<?php

namespace App\Http\Controllers;

use App\Models\Tag;

class TagController extends Controller
{
    public function index($id)
    {
        $tag = Tag::findOrFail($id);

        $articles = $tag->articles()
            ->orderBy('sort','desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('default.tag_article', compact('articles', 'tag'));
    }
}
