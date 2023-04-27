<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Individual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individuals',function(Blueprint $table){
            $table->increments('id')->comment('主键');
            $table->string('first_name',100)->nullable()->comment('名字');
            $table->string('last_name',100)->nullable()->comment('姓氏');
            $table->string('mobile',100)->nullable()->comment('手机号');
            $table->string('contact',100)->nullable()->comment('联系方式');
            $table->string('email',100)->unique()->nullable()->comment('邮箱');
            $table->string('password',100)->nullable()->comment('密码');
            $table->dateTime('create_datetime',$precision = 0)->nullable()->comment('创建时间');
            $table->dateTime('update_datetime',$precision = 0)->nullable()->comment('更新时间');
            $table->dateTime('last_login_datetime',$precision = 0)->nullable()->comment('上次登录时间');
            $table->string('language')->nullable()->comment('语言');
            $table->string('token')->nullable()->comment('token');
            $table->string('device')->nullable()->comment('设备');
            $table->string('browser',100)->nullable()->comment('浏览器');
            $table->boolean('status')->default(1)->comment('状态 0=禁用,1=启用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individuals');
    }
}
