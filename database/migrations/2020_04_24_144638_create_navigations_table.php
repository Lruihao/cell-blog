<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationsTable extends Migration
{
    /**
     * 创建 navigations 表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            $table->increments('id')->comment('导航主键');
            $table->string('name')->default('')->comment('导航名');
            $table->string('url')->default('')->comment('链接');
            $table->string('icon', 20)->default('globe')->comment('图标');
            $table->tinyInteger('target', 1)->default(0)->comment('打开方式: 0内部 1外部');
            $table->tinyInteger('sort')->default(0)->comment('排序');
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
        Schema::dropIfExists('navigations');
    }
}
