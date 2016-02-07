<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class Bill extends Model
{
	protected $table = 'bills';

	protected $fillable = ['resident_id', 'residence_id', 'name', 
								  'amount', 'due_date', 'description'];

	public function residence()
	{
		return $this->belongsTo('App\Residence');
	}

	public function residents()
	{
		return $this->belongsToMany('App\Resident');
	}

	public function getOwner()
	{
		return Resident::find($this->resident_id);
	}


	public function checkActiveState()
	{
		$residents = $this->residence->residents;
		$results = DB::select('select resident_id from bill_resident_approval
											where bill_id = :bill_id and residence_id = :residence_id',
											['bill_id' => $this->id, 'residence_id' => $this->residence->id]);
		$approved = array();
		foreach($results as $row)
		{
			$approved[] = $row->resident_id;
		}
		$total_residents = count($residents);
		$approval_count = 0;
		foreach($residents as $r)
		{
			if(in_array($r->id, $approved))
			{
				$approval_count++;
			}
		}
		if($approval_count == $total_residents)
		{
			$this->active = 1;
			$this->save();
		}
		else
		{
			return false;
		}
	}

	public function approve()
	{
		$datetime_now = date('Y-m-d H:i:s');
		$resident_id = Auth::user()->id;
		DB::insert('insert into calcdb.bill_resident_approval 
							(bill_id, resident_id, residence_id, created_at, updated_at) 
							values (?, ?, ?, ?, ?)',
							[$this->id, $resident_id, $this->residence->id, $datetime_now, $datetime_now]);
	}

	// accepts the ID of the resident we are checking against
	public function isPastDueForResident($id)
	{
		// Code
	}

	public function residentIsOwner($id)
	{
		return $id == $this->resident_id ? true : false;
	}
}
