<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimezonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timezones', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->string('abbr')->nullable();
            $table->string('offset')->nullable();
            $table->string('isdst')->nullable();
            $table->string('text')->nullable();
            $table->text('utc')->nullable();
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
        Schema::dropIfExists('timezones');
    }
}
