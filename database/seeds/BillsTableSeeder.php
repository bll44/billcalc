<?php

use Illuminate\Database\Seeder;
use App\Resident;
use App\Residence;
use App\Bill;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // set default timezone for date() functions to UTC
        date_default_timezone_set('UTC');
        $now = date('Y-m-d H:i:s'); // the current day and time
        $last_day_of_month = '2016-02-04 00:00:01';

        $blatsha = Resident::where('username', 'blatsha')->first();
        $N12thSt = Residence::where('nickname', 'Lucky Garden Gambling Place')->first();

        DB::table('bills')->insert([
        	[
	        	'resident_id' => $blatsha->id,
	        	'residence_id' => $N12thSt->id,
	        	'name' => 'Verizon bill',
	        	'amount' => null,
	        	'due_date' => $last_day_of_month,
	        	'description' => 'Verizon bill for cable and internet',
	        	'active' => 0
        	],
        	[
	        	'resident_id' => $blatsha->id,
	        	'residence_id' => $N12thSt->id,
	        	'name' => 'Gas bill',
	        	'amount' => null,
	        	'due_date' => $last_day_of_month,
	        	'description' => 'PGW gas bill',
	        	'active' => 0
        	],
        ]);
    }
}
