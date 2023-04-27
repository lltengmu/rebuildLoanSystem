<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clients extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients',function(Blueprint $table){
            $table->bigIncrements('id')->comment('主键');
            $table->string('first_name',100)->nullable()->comment('名字');
            $table->string('last_name',100)->nullable()->comment('姓氏');
            $table->integer('appellation')->nullable()->comment('称谓');
            $table->string('password',100)->nullable()->comment('密码');
            $table->string('HKID')->nullable()->comment('香港身份证号');
            $table->date('date_of_birth')->nullable()->comment('生日');
            $table->integer('marital_status')->nullable()->comment('尚未明确');
            $table->bigInteger('mobile')->nullable()->comment('手机号');
            $table->string('email',100)->nullable()->comment('邮箱');
            $table->string('nationality',100)->nullable()->comment('国籍');
            $table->text('area')->nullable()->comment('地區');
            $table->text('addres')->nullable()->comment('地址');
            $table->text('addressOne')->nullable()->comment('地址一行');
            $table->text('addressTwo')->nullable()->comment('地址第二行');
            $table->text('building')->nullable()->comment('单位');
            $table->text('floor')->nullable()->comment('楼层');
            $table->text('unit')->nullable()->comment('座數');
            $table->integer('job_status')->nullable()->comment('工作状态');
            $table->integer('salary')->nullable()->comment('薪水');
            $table->text('company_name')->nullable()->comment('公司名称');
            $table->bigInteger('company_contact')->nullable()->comment('公司电话');
            $table->text('company_addres')->nullable()->comment('公司地址');
            $table->dateTime('create_datetime',$precision = 0)->nullable()->comment('创建时间');
            $table->dateTime('update_datetime',$precision = 0)->nullable()->comment('更新时间');
            $table->dateTime('last_login_datetime',$precision = 0)->nullable()->comment('上次登录时间');
            $table->string('update_by',100)->nullable()->comment('被谁更新');
            $table->string('ip')->nullable()->comment('访问ip');
            $table->string('browser',100)->nullable()->comment('浏览器');
            $table->string('language')->nullable()->comment('语言');
            $table->string('token')->nullable()->comment('token');
            $table->string('device')->nullable()->comment('设备');
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
        Schema::dropIfExists('clients');
    }
}
