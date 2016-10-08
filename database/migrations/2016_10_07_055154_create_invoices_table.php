<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('admission');
            $table->integer('rent');
            $table->integer('consultation');
            $table->integer('doctor');
            $table->integer('surgeon');
            $table->integer('anesthesia');
            $table->integer('assistant1');
            $table->integer('assistant2');
            $table->integer('operation');
            $table->integer('delivary');
            $table->integer('medicine');
            $table->integer('pathology');
            $table->integer('usg');
            $table->integer('ecg');
            $table->integer('xray');
            $table->integer('nebulizer');
            $table->integer('suction');
            $table->integer('blood');
            $table->integer('dressing');
            $table->integer('oxygen');
            $table->integer('canulla');
            $table->integer('catheter');
            $table->integer('tube');
            $table->integer('ambulance');
            $table->integer('incubator');
            $table->integer('others');
            $table->integer('subtotal');
            $table->integer('vat');
            $table->integer('service');
            $table->integer('total_amount');
            $table->integer('discount');
            $table->integer('total');
            $table->integer('patient_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('invoices');
    }
}
