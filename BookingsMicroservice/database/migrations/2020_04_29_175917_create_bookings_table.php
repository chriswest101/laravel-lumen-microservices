<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments("id");
            $table->integer('user_id')->unsigned();
            $table->string("from_destination");
            $table->string("from_latlong");
            $table->string("to_destination");
            $table->string("to_latlong");
            $table->date("date");
            $table->string("time");
            $table->integer("no_of_people");
            $table->decimal("distance");
            $table->string('status', 20);
            $table->timestamps();
        });

        Schema::table('bookings', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
