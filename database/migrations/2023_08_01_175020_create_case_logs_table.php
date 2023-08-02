<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaseLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('case_logs', function (Blueprint $table) {
            $table->increments("id");
            $table->integer("cases_id")->nullable()->comment("贷款实例id");
            $table->string("action")->nullable()->comment("执行的动作");
            $table->dateTime("when")->comment("记录更新时间");
            $table->string("update_by")->nullable()->comment("记录更新者");
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
        Schema::dropIfExists('case_logs');
    }
}
