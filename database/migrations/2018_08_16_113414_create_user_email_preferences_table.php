<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEmailPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_email_preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->tinyInteger('update_new_feature')->unsigned()->nullable();
            $table->tinyInteger('weekly_event_guide')->unsigned()->nullable();
            $table->tinyInteger('additional_info')->unsigned()->nullable();
            $table->tinyInteger('updates_for_attendees')->unsigned()->nullable();
            $table->tinyInteger('buy_ticket')->unsigned()->nullable();
            $table->tinyInteger('organizing_update_new_feature')->unsigned()->nullable();
            $table->tinyInteger('event_sales_recap')->unsigned()->nullable();
            $table->tinyInteger('updates_for_event_organizers')->unsigned()->nullable();
            $table->tinyInteger('updates_for_event_attendees')->unsigned()->nullable();
            $table->tinyInteger('important_reminders')->unsigned()->nullable();
            $table->tinyInteger('order_confirmation')->unsigned()->nullable();
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
        Schema::table('user_email_preferences', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('user_email_preferences');
    }
}
