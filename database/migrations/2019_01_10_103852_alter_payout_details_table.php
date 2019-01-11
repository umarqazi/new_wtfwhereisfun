<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterPayoutDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payout_details', function (Blueprint $table) {
            $table->string('payment_status');
            $table->string('status');
            $table->string('token');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payout_details', function (Blueprint $table) {
            $table->dropColumn('token');
            $table->dropColumn('status');
            $table->dropColumn('payment_status');
        });
    }
}
