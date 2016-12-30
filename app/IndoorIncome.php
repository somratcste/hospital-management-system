<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndoorIncome extends Model
{
	public function report()
    {
    	return $this->belongsTo('App\Report');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
