<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechDeptSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_dept_sub', function (Blueprint $table) {
            $table->bigIncrements('ds_id');
            $table->integer('ds_sub_id')->nullable();
            $table->integer('ds_dept_id')->nullable();
            $table->integer('ds_sem_id')->nullable();
            $table->string('ds_check_key')->unique()->nullable()->comment('ds_sub_id+ds_dept_id');
            $table->integer('ds_user')->nullable();
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
        Schema::dropIfExists('tech_dept_sub');
    }
}
