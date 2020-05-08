<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * 创建文章表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table) {
            $table->increments('id')->comment('文章表主键');
            $table->string('title')->default('')->comment('标题');
            $table->integer('user_id')->unsigned()->default(0)->comment('作者ID');
            $table->integer('category_id')->unsigned()->default(0)->comment('分类ID');
            $table->string('description')->default('')->comment('描述');
            $table->string('keywords')->nullable()->comment('关键词');
            $table->integer('sort')->unsigned()->default(0)->comment('置顶排序');
            $table->boolean('comments')->default(1)->comment('评论: 1打开 0关闭');
            $table->boolean('status')->default(1)->comment('状态: 1发布 0草稿');
            $table->string('password')->nullable()->default('')->comment('文章密码');
            $table->integer('views')->unsigned()->default(0)->comment('阅读数量');
            $table->longText('markdown')->comment('markdown文章内容');
            $table->longText('html')->comment('markdown转的html页面');
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
        Schema::dropIfExists('articles');
    }
}
