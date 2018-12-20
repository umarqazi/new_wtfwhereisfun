<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventOrders1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_orders', function (Blueprint $table) {
            $table->string('stripe_refund_id')->nullable();
            $table->float('refunded_amount')->nullable();
            $table->string('refund_reason')->nullable();
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
            $table->dropColumn('refunded_amount');
            $table->dropColumn('stripe_refund_id');
            $table->dropColumn('refund_reason');
        });
    }
}

