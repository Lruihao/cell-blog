<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function index($id)
    {
        $article = Article::findOrFail($id);

        $article->increment("views");

        return view('default.show_article', compact('article'));
    }
}
