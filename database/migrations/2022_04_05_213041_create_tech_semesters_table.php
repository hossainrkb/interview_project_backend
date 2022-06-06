<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_semester', function (Blueprint $table) {
            $table->bigIncrements('sem_id');
            $table->string('sem_name')->unique()->nullable();
            $table->string('sem_sort_name')->unique()->nullable();
            $table->integer('status')->nullable();
            $table->integer('sem_user')->nullable();
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
        Schema::dropIfExists('tech_semester');
    }
}
