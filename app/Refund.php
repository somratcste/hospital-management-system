<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    public function invoiceOut()
    {
    	return $this->belongsTo('App\InvoiceOut');
    }
}
