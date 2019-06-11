<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventOrdersAddFeeColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_orders', function (Blueprint $table) {
            $table->float('stubguys_fee')->nullable();
            $table->float('stripe_processing_fee')->nullable();
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
            $table->dropColumn('stubguys_fee');
            $table->dropColumn('stripe_processing_fee');
        });
    }
}
