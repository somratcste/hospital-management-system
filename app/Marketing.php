<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    public function villages()
    {
    	return $this->hasMany('App\Village');
    }

    public function invoiceOut()
    {
    	return $this->hasOne('App\InvoiceOut');
    }
}
