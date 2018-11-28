<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->integer('quantity')->unsigned();
            $table->integer('price')->unsigned();
            $table->text('description')->nullable();
            $table->dateTime('selling_start')->nullable();
            $table->dateTime('selling_end')->nullable();
            $table->string('status')->nullable();
            $table->integer('min_order')->nullable();
            $table->integer('max_order')->nullable();
            $table->string('release_ticket')->nullable();
            $table->string('availability')->nullable();
            $table->string('type')->nullable();
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
        Schema::table('event_tickets', function (Blueprint $table) {
            $table->dropForeign(['event_id']);
        });
        Schema::dropIfExists('event_tickets');
    }
}
