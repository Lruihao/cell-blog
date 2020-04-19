<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Article extends Model
{
    public static function boot()
    {
        parent::boot();
        static::saving(function ($article) {
            $article->html = Markdown::convertToHtml($article->markdown);
        });
    }
}
