<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusBusRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_bus_route', function (Blueprint $table) {
            $table->unsignedBigInteger('bus_route_id');
            $table->unsignedBigInteger('bus_id');

            $table->foreign('bus_route_id')->references('id')->on('bus_routes');
            $table->foreign('bus_id')->references('id')->on('buses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bus_bus_route');
    }
}
