<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UsersTableSeeder::class);
        $this->call(ResidenceTableSeeder::class);
        $this->call(ResidenceResidentTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(BillResidentTableSeeder::class);

        Model::reguard();
    }
}
