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
    	DB::table('users')->insert([
            'name'     => 'Atabek Üçüncü',
            'email'    => 'atabek@netas.com',
            'password' => bcrypt('123123'),
        ]);
    }
}
