<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    public function reportproduct()
    {
    	return $this->hasOne('App\ReportProduct');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function patient()
    {
    	return $this->belongsTo('App\Patient');
    }
}
