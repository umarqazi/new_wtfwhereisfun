<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefundPolicyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refund_policies', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->integer('refund_policy_id')->unsigned()->nullable();
            $table->foreign('refund_policy_id')->references('id')->on('refund_policies')->onDelete('cascade')->onUpdate('cascade');
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
            $table->dropForeign(['refund_policy_id']);
        });
        Schema::dropIfExists('refund_policies');
    }
}
