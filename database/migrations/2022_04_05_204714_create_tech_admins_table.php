<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_admin', function (Blueprint $table) {
            $table->bigIncrements('a_id');
            $table->string('a_name')->nullable();
            $table->string('a_username')->unique()->nullable();
            $table->string('a_email')->unique()->nullable();
            $table->string('a_type')->nullable();
            $table->string('a_contact')->unique()->nullable();
            $table->integer('a_tpin')->nullable();
            $table->string('a_password')->nullable();
            $table->timestamp('a_date')->nullable();
            $table->integer('a_status')->nullable();
            $table->integer('a_user')->nullable();
            $table->integer('a_dept')->nullable();
            $table->integer('a_staff')->nullable();
            $table->integer('a_teacher')->nullable();
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
        Schema::dropIfExists('tech_admin');
    }
}
