<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_session', function (Blueprint $table) {
            $table->bigIncrements('sec_id');
            $table->string('sec_name')->unique()->nullable();
            $table->integer('sec_year')->unique()->nullable();
            $table->integer('sec_sem')->nullable();
            $table->integer('sec_probidhan')->nullable();
            $table->integer('sec_status')->nullable();
            $table->integer('sec_user')->nullable();
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
        Schema::dropIfExists('tech_session');
    }
}
