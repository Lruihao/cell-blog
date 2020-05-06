<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMottoesTable extends Migration
{
    /**
     * 创建格言表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mottoes', function (Blueprint $table) {
            $table->increments('id')->comment('格言主键');
            $table->string('motto')->default('')->comment('格言');
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
        Schema::dropIfExists('mottoes');
    }
}
