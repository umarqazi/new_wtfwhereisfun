<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable()->change();
            $table->string('thumbnail')->nullable()->change();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('thumbnail')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
            $table->string('thumbnail')->nullable(false)->change();
        });

        Schema::table('testimonials', function (Blueprint $table) {
            $table->string('thumbnail')->nullable(false)->change();
        });

    }
}
