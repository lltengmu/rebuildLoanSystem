<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLoginLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_login_logs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->nullable()->comment("用户id");
            $table->string("email")->nullable()->comment("登录的邮箱");
            $table->string("identify")->nullable()->comment("登录用户身份");
            $table->dateTime("when")->comment("登录时间");
            $table->string('ip')->nullable()->comment('ip');
            $table->string('browser')->nullable()->comment('浏览器');
            $table->string('device')->nullable()->comment('设备');
            $table->string('platform')->nullable()->comment('平台');
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
        Schema::dropIfExists('user_login_logs');
    }
}
