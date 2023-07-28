<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_templates', function (Blueprint $table) {
            $table->increments("id");
            $table->string("title")->nullable()->comment("模版标题");
            $table->string("template_image")->nullable()->comment("模版图片");
            $table->text("template_text")->nullable()->comment("模版文字");
            $table->string("update_by")->nullable()->comment("更新者");
            $table->boolean("status")->default()->comment("状态");
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
        Schema::dropIfExists('loan_templates');
    }
}
