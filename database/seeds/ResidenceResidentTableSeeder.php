<?php

use Illuminate\Database\Seeder;

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

		$now = date('Y-m-d H:i:s');
		DB::table('residence_resident')->insert([
			['resident_id' => 106, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => 106, 'residence_id' => 2, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => 104, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
			['resident_id' => 105, 'residence_id' => 1, 'created_at' => $now, 'updated_at' => $now],
		]);
	}
}
