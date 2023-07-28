<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("cases_id")->comment("贷款实例id");
            $table->integer("client_id")->comment("用户id");
            $table->string("title")->comment("文件名");
            $table->string("upload_file")->comment("文件存储路径");
            $table->string("file_type")->comment("文件扩展名/类型");
            $table->boolean("status")->default(1)->comment("状态");
            $table->string("update_by")->nullable()->comment("被谁更新");
            $table->string("loan_sys_is")->nullable()->comment("尚未明确");
            $table->timestamps();
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
        Schema::dropIfExists('attachments');
    }
}
