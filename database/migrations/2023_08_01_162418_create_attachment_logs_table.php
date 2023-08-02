<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachment_logs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("case_id")->nullable()->comment("贷款实例id");
            $table->integer("user_id")->nullable()->comment("用户id");
            $table->string("user_role")->nullable()->comment("用户角色");
            $table->string("action")->nullable()->comment("执行的动作");
            $table->dateTime("when")->nullable()->comment("查看/下载/删除 时间");
            $table->string("ip")->nullable()->comment("ip");
            $table->string("browser")->nullable()->comment("浏览器");
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
        Schema::dropIfExists('attachment_logs');
    }
}
