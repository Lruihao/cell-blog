<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\FriendshipLink;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::query()
            ->with([
                'user',
                'category',
                'tags'
            ])
            ->where('status', '=', 1)
            ->orderBy('sort','desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $links = FriendshipLink::query()
            ->where('status', '=', 1)
            ->orderBy('sort', 'desc')
            ->paginate(10, [
                'name',
                'url',
                'avatar'
            ]);

        return view('default.home', compact('articles','links'));
    }
}
