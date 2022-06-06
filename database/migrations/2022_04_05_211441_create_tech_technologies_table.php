<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechTechnologiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_technology', function (Blueprint $table) {
            $table->bigIncrements('d_id');
            $table->integer('d_code')->unique()->nullable();
            $table->string('d_name')->nullable();
            $table->string('d_sort_name')->nullable();
            $table->integer('d_probidhan')->nullable();
            $table->integer('d_department')->nullable();
            $table->integer('d_status')->nullable();
            $table->integer('d_user')->nullable();
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
        Schema::dropIfExists('tech_technology');
    }
}
