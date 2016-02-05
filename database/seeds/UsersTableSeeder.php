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
        // ensure timezone is set to UTC
        date_default_timezone_set('UTC');

        $now = date('Y-m-d H:i:s');
        DB::table('users')->insert([
            [
                'username' => 'bradylatsha',
                'email' => 'brady.latsha@gmail.com',
                'password' => Hash::make('BLKr0ck6'),
                'phone' => 7177567817, 
                'display_name' => 'Brady Latsha', 
                'balance' => null, 'v_id' => null, 
                'access_token' => null,
                'refresh_token' => null, 
                'token_expire_date' => '0000-00-00 00:00:00', 
                'created_at' => $now, 
                'updated_at' => $now
            ]
        ]);
        $num_test_users = 5;
        for($i = 0; $i < 25; $i++)
        {
            $num = str_pad($i, 3, '0', STR_PAD_LEFT);
            DB::table('users')->insert([
                [
                    'username' => 'testuser'.$num, 
                    'email' => 'testuser'.$num.'@mail.com', 
                    'password' => Hash::make('test'.$num),
                    'phone' => 1234567890, 
                    'display_name' => 'Test User '.$num, 
                    'balance' => null, 
                    'v_id' => null, 
                    'access_token' => null,
                    'refresh_token' => null, 
                    'token_expire_date' => '0000-00-00 00:00:00', 
                    'created_at' => $now, 
                    'updated_at' => $now
                ]
            ]);
        }
    	for($i = 0; $i < 300; $i++)
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
