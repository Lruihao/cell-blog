<?php

namespace App\Presenters;

use App\Models\FriendshipLink;

/**
 * Class LinkPresenter
 *
 * @package namespace App\Presenters;
 */
class LinkPresenter
{
    /**
     * 获取友情链接
     *
     * @return mixed
     */
    public function linkList()
    {
        $links = FriendshipLink::query()->orderBy('sort', 'desc')->get(['name','url']);
        return $links;
    }
}
