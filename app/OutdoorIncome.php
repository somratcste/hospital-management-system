<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutdoorIncome extends Model
{
    public function invoiceOut()
    {
    	return $this->belongsTo('App\InvoiceOut');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
