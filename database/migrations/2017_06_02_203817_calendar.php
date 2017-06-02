<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calendar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->date('date');
            $table->integer("country_id");
            $table->foreign('country_id')->references('countries')->on('id');
            $table->foreign('user_id')->references('users')->on('id');
            $table->timestamps();

        });

        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('organization_id');
            $table->foreign('organization_id')->references('organizations')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
        Schema::dropIfExists('calendars');
    }
}
