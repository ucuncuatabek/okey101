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
            'name'     => 'Atabek Sonuncu',
            'email'    => 'ornek@ornek.com',
            'password' => bcrypt('123123'),
        ]);
    }
}
