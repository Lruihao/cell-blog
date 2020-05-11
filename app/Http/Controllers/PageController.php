<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\FriendshipLink;

class PageController extends Controller
{
    /**
     * 获取页面内容
     * @param $alias
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($alias)
    {
        $page  = Page::where('link_alias', $alias)->first();

        if (!$page || !$page->status) {
            abort('404');
        }

        return view('default.show_page', compact('page'));
    }

    /**
     * 关于页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function about()
    {
        return $this->index('about');
    }

    /**
     * 留言页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function guestbook()
    {
        return $this->index('guestbook');
    }

    /**
     * 友链页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function links()
    {
        $links = FriendshipLink::query()
            ->where('status', '=', 1)
            ->orderBy('sort', 'desc')
            ->paginate(21, [
                'name',
                'url',
                'avatar',
                'description'
            ]);
        return view('default.show_link', compact('links'));
    }

    /**
     * 相册页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function album()
    {
        return view('default.show_album');
    }
}
