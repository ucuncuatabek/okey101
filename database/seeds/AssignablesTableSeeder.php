<?php

use Illuminate\Database\Seeder;

class AssignablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assignables')->insert([
            [
                'matchup_id'      => 1,
                'assignable_id'   => 1,
                'assignable_type' => 'App\Team',
            ],
            [
                'matchup_id'      => 1,
                'assignable_id'   => 2,
                'assignable_type' => 'App\Team',
            ],
        ]);

    	DB::table('assignables')->insert([
    		[
	    		'matchup_id'      => 2,
	    		'assignable_id'   => 1,
	    		'assignable_type' => 'App\Team',
	    	],
    		[
	    		'matchup_id'      => 2,
	    		'assignable_id'   => 2,
	    		'assignable_type' => 'App\Team',
	    	],
        ]);
    }
}
