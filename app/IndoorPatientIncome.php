<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndoorPatientIncome extends Model
{
    public function invoice()
    {
    	return $this->belongsTo('App\Report');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
