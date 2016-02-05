<?php

use Illuminate\Database\Seeder;
use App\User;
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

		$bradylatsha = User::where('username', 'bradylatsha')->first();
		$testuser000 = User::where('username', 'testuser000')->first();
		$testuser001 = User::where('username', 'testuser001')->first();

		$now = date('Y-m-d H:i:s');
		DB::table('residence_resident')->insert([
			['resident_id' => $bradylatsha->id, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => $bradylatsha->id, 'residence_id' => 2, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => $testuser000->id, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => $testuser001->id, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
		]);
	}
}
