<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceOutProduct extends Model
{
	public function invoiceOut()
	{
		return $this->belongsTo('App\InvoiceOut');
	}
   
}
