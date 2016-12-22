<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReportProduct extends Model
{
    public  function report()
    {
    	return $this->belongsTo('App\Report');
    }
}
