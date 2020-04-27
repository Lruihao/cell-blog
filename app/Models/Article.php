<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;
use Encore\Admin\Facades\Admin;

class Article extends Model
{
    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'sort' => 0,
        'views' => 0,
    ];

    /**
     * 模型启动的方法
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            $article->user_id = Admin::user()->id;
        });
        static::saving(function ($article) {
            $article->category_id ?? $article->category_id = 0;
            $article->html = Markdown::convertToHtml($article->markdown);
        });
    }

    /**
     * 关联文章作者
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 关联文章分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * 关联文章标签
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class, "article_tags");
    }

}
