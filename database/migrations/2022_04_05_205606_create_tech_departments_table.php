<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_department', function (Blueprint $table) {
            $table->bigIncrements('tech_id');
            $table->string('tech_full_name')->unique()->nullable();
            $table->string('tech_short_name')->unique()->nullable();
            $table->string('tech_username')->unique()->nullable();
            $table->integer('tech_tpin')->nullable();
            $table->string('tech_password')->nullable();
            $table->integer('tech_status')->nullable();
            $table->integer('tech_user')->nullable();
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
        Schema::dropIfExists('tech_department');
    }
}
