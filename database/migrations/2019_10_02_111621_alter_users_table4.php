<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('routing_number')->nullable();
            $table->string('bank_currency')->nullable();
            $table->string('account_holder')->nullable();
            $table->string('account_type')->nullable();
            $table->string('bank_address')->nullable();
            $table->string('bank_city')->references('id')->on('cities')->nullable();
            $table->string('bank_zip_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('routing_number');
            $table->dropColumn('bank_currency');
            $table->dropColumn('account_holder');
            $table->dropColumn('account_type');
            $table->dropColumn('bank_state');
            $table->dropColumn('bank_city');
            $table->dropColumn('bank_zip_code');
        });
    }
}
