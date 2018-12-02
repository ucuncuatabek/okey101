<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
    		[
	    		'name'  => 'Çömezler',
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
	    	[
	    		'name'  => 'Ustalar',
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
        ]);
    }
}
