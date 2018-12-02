<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('members')->insert([
    		[
	    		'name'  => 'Evrim',
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'name'  => 'Atabek',
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'name'  => 'Berkay',
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'name'  => 'Ömer',
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
        ]);
    }
}
