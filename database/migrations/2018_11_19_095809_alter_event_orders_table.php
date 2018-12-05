<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEventOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_orders', function (Blueprint $table) {
            $table->float('discount')->nullable();
            $table->tinyInteger('is_deal_availed')->nullable();
            $table->integer('hot_deal_id')->nullable()->unsigned();
            $table->foreign('hot_deal_id')->references('id')->on('event_hot_deals')->onDelete('restrict')->onUpdate('restrict');
            $table->string('qr_image')->nullable();
            $table->string('ticket_pdf')->nullable();
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
            $table->dropForeign(['hot_deal_id']);
        });

        Schema::table('event_orders', function (Blueprint $table) {
            $table->dropColumn('discount');
            $table->dropColumn('is_deal_availed');
            $table->dropColumn('hot_deal_id');
            $table->dropColumn('qr_image');
            $table->dropColumn('ticket_pdf');
        });

    }
}
