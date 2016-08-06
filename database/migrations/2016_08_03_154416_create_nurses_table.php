<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nurses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('degree');
            $table->string('gender');
            $table->string('birthDate');
            $table->string('specialist');
            $table->integer('mobile');
            $table->string('email');
            $table->string('hAddress');
            $table->string('oAddress');
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
        Schema::drop('nurses');
    }
}
