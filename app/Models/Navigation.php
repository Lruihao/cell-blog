<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    /**
     * 模型启动的方法
     */
    public static function boot()
    {
        parent::boot();

        static::saving(function ($navigation) {
            $navigation->icon ?? $navigation->icon = 'globe';
        });
    }

}
