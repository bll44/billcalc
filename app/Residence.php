<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Residence extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'residences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['address', 'address2', 'city', 'state', 
                           'zipcode', 'num_residents', 'nickname', 
                           'monthly_rent_total', 'created_at', 'updated_at'];

    public function residents()
    {
        return $this->belongsToMany('App\Resident');
    }

    public function bills()
    {
        return $this->hasMany('App\Bill');
    }
}
