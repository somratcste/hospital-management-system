<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationType extends Model
{
	public function operation()
	{
		return $this->hasOne('App\Operation');
	}
}
