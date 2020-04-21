<?php

namespace App\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Article extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'sort' => 0,
        'password' => '',
        'views' => 0,
    ];

    /**
     * 模型启动的方法
     */
    public static function boot()
    {
        parent::boot();
        static::saving(function ($article) {
            $article->html = Markdown::convertToHtml($article->markdown);
        });
    }

    /**
     * 获取关联到文章的作者
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * 获取关联到文章的分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

}
