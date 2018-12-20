<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventHotDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_hot_deals', function (Blueprint $table) {
            $table->integer('time_location_id')->unsigned();
            $table->foreign('time_location_id')->references('id')->on('event_time_locations')->onDelete('cascade')->onUpdate('cascade');
            $table->dropForeign(['event_id']);
            $table->dropColumn('event_id');
            $table->string('stripe_coupon_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_hot_deals', function (Blueprint $table) {
            $table->dropForeign(['time_location_id'])->unsigned();
            $table->dropColumn('time_location_id')->references('id')->on('event_time_locations')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->dropColumn('stripe_coupon_id');
        });
    }
}
