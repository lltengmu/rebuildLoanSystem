<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLboCaseStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lbo_case_statuses',function(Blueprint $table){
            $table->increments('id');
            $table->string('shortt_code')->nullable();
            $table->string('label_tc')->nullable();
            $table->string('label_en')->nullable();
            $table->boolean('status')->default(1);
            $table->string('remark')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lbo_case_statuses');
    }
}
