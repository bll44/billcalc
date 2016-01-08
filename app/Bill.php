<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
	protected $table = 'bills';

	public function residence()
	{
		return $this->belongsTo('App\Residence');
	}
}
