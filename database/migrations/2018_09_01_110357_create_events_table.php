<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('contact')->nullable();
            $table->string('referral_code')->nullable();
            $table->integer('discount')->nullable()->unsigned();
            $table->string('access')->nullable();
            $table->string('header_image')->nullable();
            $table->string('slug')->nullable();
            $table->text('additional_message')->nullable();
            $table->tinyInteger('total_capacity')->nullable();
            $table->tinyInteger('is_draft')->nullable()->default(0);
            $table->tinyInteger('is_online')->nullable();
            $table->tinyInteger('ticket_flag')->nullable();
            $table->tinyInteger('is_sold_out')->nullable();
            $table->tinyInteger('is_shareable')->nullable();
            $table->tinyInteger('is_published')->nullable()->default(0);
            $table->tinyInteger('is_cancelled')->nullable()->default(0);
            $table->tinyInteger('is_approved')->nullable()->default(0);
            $table->tinyInteger('status')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('event_type_id')->unsigned()->nullable();
            $table->foreign('event_type_id')->references('id')->on('event_types')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('event_topic_id')->unsigned()->nullable();
            $table->foreign('event_topic_id')->references('id')->on('event_topics')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('event_sub_topic_id')->unsigned()->nullable();
            $table->foreign('event_sub_topic_id')->references('id')->on('event_sub_topics')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['event_type_id']);
            $table->dropForeign(['event_topic_id']);
            $table->dropForeign(['event_sub_topic_id']);
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('events');
    }
}
