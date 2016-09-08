<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('patient_type');
            $table->string('name');
            $table->string('gender');
            $table->string('birthDate');
            $table->string('bloodGroup');
            $table->string('symptoms');
            $table->string('mobile');
            $table->string('email');
            $table->string('address');
            $table->string('image');
            $table->string('size');
            $table->string('type');
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
        Schema::drop('patients');
    }
}
