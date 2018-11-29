<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('event_id')->unsigned();
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('ticket_id')->unsigned();
            $table->foreign('ticket_id')->references('id')->on('event_tickets')->onDelete('cascade')->onUpdate('cascade');
            $table->string('transaction_id')->nullable();
            $table->float('payment_gross')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('payer_email')->nullable();
            $table->string('payment_status')->nullable();
            $table->integer('quantity');
            $table->float('ticket_price');
            $table->string('paypal_token')->nullable();
            $table->string('payment_method');
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
        Schema::table('event_orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['event_id']);
            $table->dropForeign(['ticket_id']);
        });

        Schema::dropIfExists('event_orders');
    }
}
