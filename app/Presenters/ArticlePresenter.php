<?php

namespace App\Presenters;

use App\Models\Article;

/**
 * Class ArticlePresenter
 *
 * @package namespace App\Presenters;
 */
class ArticlePresenter
{
    /**
     * 获取热门文章
     *
     * @return mixed
     */
    public function hotArticleList()
    {
        return Article::query()
            ->orderBy('views', 'desc')
            ->paginate(8, [
                'id',
                'title',
                'views'
            ]);
    }

    /**
     * 格式化标题
     * @param $title
     * @return string
     */
    public function formatTitle($title)
    {
        if (strlen($title) <= 20) {
            return $title;
        } else {
            return mb_substr($title, 0, 20, 'utf-8')."...";
        }
    }
}
