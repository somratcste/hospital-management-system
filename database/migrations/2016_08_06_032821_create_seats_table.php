<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('seatNo');
            $table->integer('seatFloor');
            $table->integer('rent');
            $table->string('seatType');
            $table->string('status');
            $table->string('image');
            $table->string('size');
            $table->string('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('seats');
    }
}
