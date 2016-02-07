<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resident extends User
{
 
    public function residences()
    {
    	return $this->belongsToMany('App\Residence');
    }

    public function bills()
    {
    	return $this->belongsToMany('App\Bill');
    }

}
