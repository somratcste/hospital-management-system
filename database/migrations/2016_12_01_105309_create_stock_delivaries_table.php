<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockDelivariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_delivaries', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('stock_id');
            $table->integer('type');
            $table->integer('quantity');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stock_delivaries');
    }
}
