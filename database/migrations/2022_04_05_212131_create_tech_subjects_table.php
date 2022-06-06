<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_subjects', function (Blueprint $table) {
            $table->bigIncrements('sub_id');

            $table->integer('sub_code')->unique()->nullable();
            $table->string('sub_name')->nullable();

            $table->integer('sub_t_credit')->nullable();
            $table->integer('sub_p_credit')->nullable();
            $table->integer('sub_total_credit')->nullable();
          
            $table->integer('sub_tc_marks')->nullable();
            $table->integer('sub_tf_marks')->nullable();
            $table->integer('sub_pc_marks')->nullable();
            $table->integer('sub_pf_marks')->nullable();
            $table->integer('sub_total_marks')->nullable();

            $table->integer('sub_dept')->nullable();
            $table->integer('sub_probidhan')->nullable();
            $table->text('sub_description')->nullable();
            $table->integer('sub_status')->nullable();
            $table->integer('sub_user')->nullable();
            
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
        Schema::dropIfExists('tech_subjects');
    }
}
