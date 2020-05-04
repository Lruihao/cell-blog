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
        return FriendshipLink::query()
            ->where('status', '=', 1)
            ->orderBy('sort', 'desc')
            ->paginate(10, [
                'name',
                'url',
                'avatar'
            ]);
    }
}