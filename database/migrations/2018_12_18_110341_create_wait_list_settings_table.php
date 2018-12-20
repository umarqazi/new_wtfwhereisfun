<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaitListSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wait_list_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('event_time_locations_id')->unsigned();
            $table->foreign('event_time_locations_id')->references('id')->on('event_time_locations')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('triggers_on');
            $table->integer('max_count');
            $table->tinyInteger('collect_name');
            $table->tinyInteger('collect_email');
            $table->tinyInteger('collect_phn')->nullable();
            $table->integer('time_to_respond_days');
            $table->integer('time_to_respond_hours');
            $table->integer('time_to_respond_mins');
            $table->text('auto_respond_msgs');
            $table->text('ticket_release_msgs');
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
        Schema::dropIfExists('wait_list_settings');
    }
}
