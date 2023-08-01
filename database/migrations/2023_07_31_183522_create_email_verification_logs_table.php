<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailVerificationLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_verification_logs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("client_id")->comment("客户id");
            $table->dateTime('when')->nullable()->comment('邮箱验证时间');
            $table->string('ip')->nullable()->comment('ip');
            $table->string('browser',100)->nullable()->comment('浏览器');
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
        Schema::dropIfExists('email_verification_logs');
    }
}
