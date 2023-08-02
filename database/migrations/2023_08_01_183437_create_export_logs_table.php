<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExportLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('export_logs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->comment("执行者id");
            $table->json("cases_id")->comment("导出的数据id");
            $table->dateTime("when")->comment("执行者id");
            $table->string("update_by")->comment("更新者");
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
        Schema::dropIfExists('export_logs');
    }
}
