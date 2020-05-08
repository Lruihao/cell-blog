<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * 创建 pages 表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id')->comment('页面主键');
            $table->string('title')->default('')->comment('页面标题');
            $table->string('link_alias', 100)->nullable()->comment('链接别名');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('description')->default('')->comment('描述');
            $table->boolean('comments')->default(1)->comment('评论: 1打开 0关闭');
            $table->boolean('status')->default(1)->comment('状态: 1发布 0草稿');
            $table->string('password')->nullable()->default('')->comment('页面密码');
            $table->longText('markdown')->comment('markdown页面内容');
            $table->longText('html')->comment('markdown转的html页面');
            $table->timestamps();
            $table->unique('link_alias');
            $table->index('link_alias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
