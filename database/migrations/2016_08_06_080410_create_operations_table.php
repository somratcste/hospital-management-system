<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date');
            $table->time('time');
            $table->string('description');
            $table->string('image');
            $table->string('size');
            $table->string('type');
            $table->integer('operationType_id');
            $table->integer('patient_id');
            $table->integer('doctor_id');
            $table->integer('seat_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('operations');
    }
}
