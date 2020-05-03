<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * 创建标签表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function(Blueprint $table) {
            $table->increments('id')->comment('标签主键');
            $table->string('name', 20)->unique()->comment('标签名称');
            $table->string('description')->default('')->comment('描述');
            $table->string('keywords')->nullable()->comment('关键词');
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
        Schema::dropIfExists('tags');
    }
}
