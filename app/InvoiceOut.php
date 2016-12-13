<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceOut extends Model
{
    public function patientout()
    {
    	return $this->belongsTo('App\Patientout');
    }

    public function marketing()
    {
    	return $this->belongsTo('App\Marketing');
    }

    public function village()
    {
    	return $this->belongsTo('App\Village');
    }

    public function refund()
    {
        return $this->hasOne('App\Refund');
    }

    public function outdoorIncome()
    {
        return $this->hasMany('App\OutdoorIncome');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function invoiceoutproduct()
    {
        return $this->hasOne('App\InvoiceOutProduct');
    }
}
