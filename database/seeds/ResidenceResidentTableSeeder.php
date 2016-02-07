<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Resident;

class ResidenceResidentTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run()
	{
		date_default_timezone_set('UTC');

		$blatsha 	 = Resident::where('username', 'blatsha')->first();
		$testuser000 = Resident::where('username', 'testuser000')->first();
		$testuser001 = Resident::where('username', 'testuser001')->first();

		$now = date('Y-m-d H:i:s');
		DB::table('residence_resident')->insert([
			['resident_id' => $blatsha->id, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => $blatsha->id, 'residence_id' => 2, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => $testuser000->id, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => $testuser001->id, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
		]);
	}
}
