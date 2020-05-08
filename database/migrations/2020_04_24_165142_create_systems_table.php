<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemsTable extends Migration
{
    /**
     * 创建系统设置属性表
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systems', function (Blueprint $table) {
            $table->increments('id')->comment('设置主键');
            $table->string('name', 30)->comment('设置名称');
            $table->string('system_key', 30)->unique()->comment('设置项');
            $table->text('system_value')->nullable()->comment('设置值');
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
        Schema::dropIfExists('systems');
    }
}
