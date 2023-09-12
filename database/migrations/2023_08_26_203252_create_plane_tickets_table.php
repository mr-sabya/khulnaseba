<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaneTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('route_id');
            $table->integer('airplane_id');
            $table->integer('business_price')->default(0);
            $table->integer('economic_price')->default(0);
            $table->string('air_time', 50);
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
        Schema::dropIfExists('plane_tickets');
    }
}
