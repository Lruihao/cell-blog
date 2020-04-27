<?php

namespace App\Models;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * 模型启动的方法
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($page) {
            $page->html = Markdown::convertToHtml($page->markdown);
        });
    }
}
