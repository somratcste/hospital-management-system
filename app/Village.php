<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    public function marketing()
    {
    	return $this->belongsTo('App\Marketing');
    }

    public function invoiceOut()
    {
    	return $this->hasOne('App\InvoiceOut');
    }
}
