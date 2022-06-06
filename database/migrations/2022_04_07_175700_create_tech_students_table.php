<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_student', function (Blueprint $table) {
            $table->bigIncrements('s_id');
            $table->string('s_name')->nullable();
            $table->string('s_i_roll')->unique()->nullable();
            $table->string('s_board_roll')->unique()->nullable();
            $table->string('s_board_reg_no')->unique()->nullable();
            $table->integer('s_session')->nullable();
            $table->integer('s_shift')->nullable();
            $table->integer('s_probidhan')->nullable();
            $table->integer('s_dept')->nullable();
            $table->integer('s_sem')->nullable();
            $table->integer('s_section')->nullable();
            $table->timestamp('s_admission_date')->nullable();
            $table->string('s_contact_no')->unique()->nullable();
            $table->string('s_father')->nullable();
            $table->string('s_mother')->nullable();
            $table->integer('s_gender')->nullable();
            $table->integer('s_type')->nullable();
            $table->string('s_image')->nullable();
            $table->string('s_picture')->nullable();
            $table->string('s_password')->nullable();
            $table->integer('s_status')->nullable();
            $table->integer('s_user')->nullable();
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
        Schema::dropIfExists('tech_student');
    }
}
