<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notification_templates', function (Blueprint $table) {
            $table->increments("send_template_id")->comment("id");
            $table->string("category")->nullable()->comment("类型");
            $table->string("title")->nullable()->comment("邮件标题");
            $table->string("content")->nullable()->comment("邮件内容");
            $table->dateTime("createtime")->nullable()->comment("创建时间");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notification_templates');
    }
}
