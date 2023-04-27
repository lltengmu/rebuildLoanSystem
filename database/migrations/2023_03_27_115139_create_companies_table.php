<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->commmet('名字');
            $table->string('email')->unique()->nullable()->commmet('名字');
            $table->string('password')->nulllable();
            $table->string('contact')->nulllable();
            $table->dateTime('create_datetime')->nullable();
            $table->dateTime('update_datetime')->nullable();
            $table->dateTime('last_login_datetime')->nullable();
            $table->dateTime('ip')->nullable();
            $table->boolean('status')->nullable();
            $table->string('token')->nullable();
            $table->string('borswer_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
