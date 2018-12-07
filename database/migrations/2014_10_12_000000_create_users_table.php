<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('prefix')->nullable();
            $table->string('suffix')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('job_title')->nullable();
            $table->string('company')->nullable();
            $table->string('website')->nullable();
            $table->text('blog')->nullable();
            $table->integer('birth_date')->nullable();
            $table->string('birth_month')->nullable();
            $table->integer('birth_year')->nullable();
            $table->integer('age')->nullable();
            $table->enum('gender',['male', 'female', 'other'])->nullable();
            $table->tinyInteger('is_social_signup')->unsigned()->default('0');
            $table->enum('social_type', ['facebook', 'google', 'twitter', 'instagram'])->nullable();
            $table->string('social_id')->nullable();
            $table->string('profile_picture')->nullable();
            $table->string('profile_thumbnail')->nullable();
            $table->tinyInteger('is_verified')->unsigned()->default('0');
            $table->tinyInteger('is_blocked')->unsigned()->default('0');
            $table->tinyInteger('is_deactivated')->unsigned()->default('0');
            $table->dateTime('last_login')->nullable();
            $table->string('account_close_type')->nullable();
            $table->text('account_close_reason')->nullable();
            $table->string('stripe_user_id')->nullable();
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
