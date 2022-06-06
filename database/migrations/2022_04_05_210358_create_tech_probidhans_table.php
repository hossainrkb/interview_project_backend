<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechProbidhansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_probidhan', function (Blueprint $table) {
            $table->bigIncrements('pro_id');
            $table->integer('pro_name')->unique()->nullable();
            $table->integer('pro_year')->unique()->nullable();
            $table->integer('pro_default')->nullable();
            $table->integer('pro_status')->nullable();
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
        Schema::dropIfExists('tech_probidhan');
    }
}
