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
    protected $fillable = ['address', 'num_residents', 'nickname', 'monthly_rent_total'];

    public function residents()
    {
        return $this->belongsToMany('App\Resident', 'resident_residence');
    }

    public function saveWithUUID()
    {
        $uuid = \DB::select('SELECT UUID_SHORT()');
        $this->id = $uuid;
        $this->save();
    }
}
