<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('patient_id');
            $table->integer('marketing_id');
            $table->integer('village_id');
            $table->float('subtotal');
            $table->float('percent');
            $table->float('percent_amount');
            $table->float('without_percent');
            $table->integer('discount');
            $table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoice_outs');
    }
}
