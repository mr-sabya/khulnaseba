<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirlinePlaneCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_plane_counter', function (Blueprint $table) {
            $table->unsignedBigInteger('airline_id');
            $table->unsignedBigInteger('counter_id');

            $table->foreign('airline_id')->references('id')->on('airlines');
            $table->foreign('counter_id')->references('id')->on('plane_counters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airline_plane_counter');
    }
}
