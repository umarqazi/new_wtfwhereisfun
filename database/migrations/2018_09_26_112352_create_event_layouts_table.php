<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventLayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_layouts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('path');
            $table->string('image');
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->integer('event_layout_id')->unsigned()->nullable();
            $table->foreign('event_layout_id')->references('id')->on('event_layouts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['event_layout_id']);
        });
        Schema::dropIfExists('event_layouts');
    }
}
