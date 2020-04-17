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
            $table->string('author')->default('')->comment('作者'); 
            $table->boolean('category_id')->default(0)->comment('分类id');
            $table->string('description')->default('')->comment('描述');
            $table->string('keywords')->default('')->comment('关键词');
            $table->integer('sort')->default(0)->comment('置顶排序');
            $table->string('password')->default('')->comment('文章密码');
            $table->integer('views')->unsigned()->default(0)->comment('阅读数量');
            $table->longText('markdown')->nullable()->comment('markdown文章内容');
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
