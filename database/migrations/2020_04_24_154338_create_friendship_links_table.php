<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFriendshipLinksTable extends Migration
{
    /**
     * 创建 friendship_links 表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('friendship_links', function (Blueprint $table) {
            $table->increments('id')->comment('友链主键');
            $table->string('name', 50)->default('')->comment('链接名');
            $table->string('url')->default('')->comment('链接地址');
            $table->string('avatar')->nullable()->comment('头像地址');
            $table->string('description')->default('')->comment('友链描述');
            $table->tinyInteger('sort')->default(0)->comment('排序');
            $table->boolean('status')->default(1)->comment('状态: 1启用 0关闭');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('friendship_links');
    }
}
