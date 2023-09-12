<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('banner_sub_heading')->nullable();
            $table->string('banner_heading')->nullable();
            $table->string('banner_text')->nullable();
            $table->string('banner_image')->nullable();

            $table->text('about_us_short_text')->nullable();
            $table->text('about_us_text')->nullable();
            $table->string('about_us_image')->nullable();

            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_text')->nullable();

            $table->string('copyright_text')->nullable();

            $table->text('help')->nullable();
            $table->text('terms_conditions')->nullable();
            $table->text('privacy_policy')->nullable();
            $table->text('about_khulna')->nullable();
            
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
        Schema::dropIfExists('settings');
    }
}
