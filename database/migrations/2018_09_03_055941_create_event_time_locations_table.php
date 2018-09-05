<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTimeLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_time_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->string('location')->nullable();
            $table->string('address')->nullable();
            $table->string('display_currency')->nullable();
            $table->string('transacted_currency')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->dateTime('starting')->nullable();
            $table->dateTime('ending')->nullable();
            $table->integer('timezone_id')->unsigned();
            $table->foreign('timezone_id')->references('id')->on('timezones')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('event_time_locations', function (Blueprint $table) {
            $table->dropForeign(['timezone_id']);
            $table->dropForeign(['event_id']);
        });
        Schema::dropIfExists('event_time_locations');
    }
}
