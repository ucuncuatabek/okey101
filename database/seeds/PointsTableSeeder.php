<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('points')->insert([
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 1,
	    		'point'      => 50,
	    		'round'      => 1,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 2,
	    		'point'      => 30,
	    		'round'      => 1,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 3,
	    		'point'      => 92,
	    		'round'      => 1,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 4,
	    		'point'      => 193,
	    		'round'      => 1,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 1,
	    		'point'      => 120,
	    		'round'      => 2,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 2,
	    		'point'      => 69,
	    		'round'      => 2,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 3,
	    		'point'      => 324,
	    		'round'      => 2,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 4,
	    		'point'      => 230,
	    		'round'      => 2,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 1,
	    		'point'      => 301,
	    		'round'      => 3,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 2,
	    		'point'      => 82,
	    		'round'      => 3,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 3,
	    		'point'      => 176,
	    		'round'      => 3,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
    		[
	    		'matchup_id' => 1,
	    		'member_id'  => 4,
	    		'point'      => 400,
	    		'round'      => 3,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
        ]);
    }
}
