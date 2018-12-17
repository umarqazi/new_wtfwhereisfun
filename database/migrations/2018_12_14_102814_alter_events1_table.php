<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEvents1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->string('stripe_product_id')->nullable()->default(null);
        });

        Schema::table('event_tickets', function (Blueprint $table) {
            $table->string('stripe_sku_id')->nullable()->default(null);
        });

        Schema::table('event_orders', function (Blueprint $table) {
            $table->string('stripe_order_id')->nullable()->default(null);
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
            $table->dropColumn('stripe_product_id');
        });

        Schema::table('event_tickets', function (Blueprint $table) {
            $table->dropColumn('stripe_sku_id')->nullable()->default(null);
        });

        Schema::table('event_orders', function (Blueprint $table) {
            $table->dropColumn('stripe_order_id')->nullable()->default(null);
        });
    }
}
