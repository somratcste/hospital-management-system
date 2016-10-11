<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patientout extends Model
{
    public function doctor()
    {
    	return $this->belongsTo('App\Doctor');
    }

    public function invoiceOut()
    {
    	return $this->hasOne('App\InvoiceOut');
    }
}
