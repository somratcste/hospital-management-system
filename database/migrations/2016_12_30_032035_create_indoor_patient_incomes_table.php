<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndoorPatientIncomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indoor_patient_incomes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('invoice_id');
            $table->integer('taka');
            $table->integer('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('indoor_patient_incomes');
    }
}
