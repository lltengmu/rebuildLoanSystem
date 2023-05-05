<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_providers',function(Blueprint $table){
            $table->bigIncrements('id')->comment('主键');
            $table->string('sys_id')->nullable()->comment('加密id');
            $table->string('first_name',100)->nullable()->comment('名字');
            $table->string('last_name',100)->nullable()->comment('姓氏');
            $table->string('email',100)->unique()->nullable()->comment('邮箱');
            $table->string('password',100)->nullable()->comment('密码');
            $table->string('mobile',100)->nullable()->comment('手机号');
            $table->bigInteger('contact')->nullable()->comment('常联系人');
            $table->integer('role')->nullable()->comment('规则');
            $table->integer('company_id')->comment('所属机构id');
            $table->dateTime('create_datetime',$precision = 0)->nullable()->comment('创建时间');
            $table->dateTime('update_datetime',$precision = 0)->nullable()->comment('更新时间');
            $table->dateTime('last_login_datetime',$precision = 0)->nullable()->comment('上次登录时间');
            $table->string('ip')->nullable()->comment('访问ip');
            $table->boolean('status')->default(1)->comment('状态 0=禁用,1=启用');
            $table->string('token')->nullable()->comment('token');
            $table->string('browser')->nullable()->comment('浏览器');
            $table->integer('permission1')->nullable();
            $table->integer('permission2')->nullable();
            $table->integer('permission3')->nullable();
            $table->integer('permission4')->nullable();
            $table->integer('update_by')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_providers');
    }
}
