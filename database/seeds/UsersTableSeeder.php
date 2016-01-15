<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create();

    	for($i = 0; $i < 100; $i++)
    	{
    		$dateTime = $faker->dateTimeThisDecade('now');
    		$phoneNumber = rand(1, 9).rand(0, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9).rand(1, 9);
    		DB::table('users')->insert([
	        	'username' => $faker->userName,
	        	'email' => $faker->email,
	        	'password' => Hash::make('test123'),
	        	'phone' => $phoneNumber,
	        	'display_name' => $faker->firstName . ' ' . $faker->lastName,
	        	'created_at' => $dateTime,
	        	'updated_at' => $dateTime,
	        ]);
    	}
        
    }
}
