<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_products', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('report_name');
            $table->integer('report_room');
            $table->integer('report_cost');
            $table->integer('report_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('report_products');
    }
}
