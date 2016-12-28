<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('operation_name');
            $table->integer('operation_cost');
            $table->integer('operation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('operation_products');
    }
}
