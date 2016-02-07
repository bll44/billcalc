<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Resident;
use App\Residence;
use App\Bill;

class BillResidentTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		date_default_timezone_set('UTC');
		$now = date('Y-m-d H:i:s');

		$blatsha 	 = Resident::where('username', 'blatsha')->first();
		$testuser000 = Resident::where('username', 'testuser000')->first();
		$testuser001 = Resident::where('username', 'testuser001')->first();

		DB::table('bill_resident')->insert([
			['bill_id' => '1', 'resident_id' => $blatsha->id, 'created_at' => $now, 'updated_at' => $now],
			['bill_id' => '1', 'resident_id' => $testuser000->id, 'created_at' => $now, 'updated_at' => $now],
			['bill_id' => '1', 'resident_id' => $testuser001->id, 'created_at' => $now, 'updated_at' => $now],
			['bill_id' => '2', 'resident_id' => $blatsha->id, 'created_at' => $now, 'updated_at' => $now],
			['bill_id' => '2', 'resident_id' => $testuser000->id, 'created_at' => $now, 'updated_at' => $now],
			['bill_id' => '2', 'resident_id' => $testuser001->id, 'created_at' => $now, 'updated_at' => $now],
		]);
	}
}
