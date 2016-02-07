<?php

use Illuminate\Database\Seeder;

class ResidenceTableSeeder extends Seeder
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
    	DB::table('residences')->insert([
    		[
    			'address1' => '445 N 12th Street',
	    		'address2' => 'Unit C',
	    		'city' => 'Philadelphia',
	    		'state' => 'Pennsylvania',
	    		'zipcode' => 19123,
	    		'num_residents' => 3,
	    		'nickname' => 'Lucky Garden Gambling Place',
	    		'monthly_rent' => 2000.00,
	    		'created_at' => $now,
	    		'updated_at' => $now,
    		],
     		[
    			'address1' => '536 N 34th Street',
	    		'address2' => 'Apt 2',
	    		'city' => 'Philadelphia',
	    		'state' => 'Pennsylvania',
	    		'zipcode' => 19107,
	    		'num_residents' => 3,
	    		'nickname' => 'West Philly Shit Hole',
	    		'monthly_rent' => 1875.00,
	    		'created_at' => $now,
	    		'updated_at' => $now,
    		],    		
    	]);
    }
 }
