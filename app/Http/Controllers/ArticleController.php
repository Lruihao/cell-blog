<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * 查看文章
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $article = Article::findOrFail($id);

        $prev = Article::query()
            ->orderBy('created_at', 'desc')
            ->where('id', '<', $article->id)
            ->limit(1)
            ->first(['id', 'title']);

        $next = Article::query()
            ->orderBy('created_at', 'asc')
            ->where('id', '>', $article->id)
            ->limit(1)
            ->first(['id', 'title']);

        if (!$article->status){
            abort(404);
        }
        $article->increment("views");

        return view('default.show_article', compact('article', 'prev', 'next'));
    }

    /**
     * 多字段搜索文章
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $articles = Article::query()
            ->with([
                'category',
                'tags'
            ])
            ->where('title', 'like', "%{$request->wd}%")
            ->orWhere('markdown', 'like', "%{$request->wd}%")
            ->orWhere('description', 'like', "%{$request->wd}%")
            ->orWhere('keywords', 'like', "%{$request->wd}%")
            ->paginate(10);

        return view('default.search_article', compact('articles'));
    }
}
