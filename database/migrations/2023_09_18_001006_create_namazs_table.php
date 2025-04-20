<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamazsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('namazs', function (Blueprint $table) {
            $table->id();
            $table->string('hijri_date');
            $table->date('date')->unique();
            $table->integer('division_id');
            $table->string('tahajjud');
            $table->string('fojr');
            $table->string('sun_rise');
            $table->string('ishraq');
            $table->string('noon');
            $table->string('johor');
            $table->string('asor');
            $table->string('sun_set');
            $table->string('magrib');
            $table->string('isha');
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
        Schema::dropIfExists('namazs');
    }
}
