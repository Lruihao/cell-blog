<?php

namespace App\Presenters;

use App\Models\Navigation;

/**
 * Class NavigationPresenter
 *
 * @package namespace App\Presenters;
 */
class NavigationPresenter
{
    /**
     * 获取简单导航
     *
     * @return mixed
     */
    public function simpleNavList()
    {
        return Navigation::query()
            ->orderBy('sort', 'desc')
            ->get( ['name', 'url']);
    }
}
