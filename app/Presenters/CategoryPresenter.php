<?php

namespace App\Presenters;

use App\Models\Category;

/**
 * Class CategoryPresenter
 *
 * @package namespace App\Presenters;
 */
class CategoryPresenter
{
    /**
     * 获取分类列表
     *
     * @return mixed
     */
    public function categoryList()
    {
        return Category::query()->get(['id', 'name']);
    }

}
