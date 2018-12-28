<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_list', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guest_list_id')->unsigned();
            $table->foreign('guest_list_id')->references('id')->on('guest_lists')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('event_tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name');
            $table->integer('quantity');
            $table->string('guest_affiliation')->nullable();
            $table->string('guest_email')->nullable();
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
        Schema::dropIfExists('guest_list');
    }
}
