<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaneCounterPlaneTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_counter_plane_ticket', function (Blueprint $table) {
            $table->unsignedBigInteger('plane_counter_id');
            $table->unsignedBigInteger('plane_ticket_id');

            $table->foreign('plane_counter_id')->references('id')->on('plane_counters');
            $table->foreign('plane_ticket_id')->references('id')->on('plane_tickets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plane_counter_plane_ticket');
    }
}
