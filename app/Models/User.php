<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * 关联 admin_users 数据表
     *
     * @var string
     */
    protected $table = 'admin_users';
}
