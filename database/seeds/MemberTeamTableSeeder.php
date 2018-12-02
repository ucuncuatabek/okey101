<?php

use Illuminate\Database\Seeder;

class MemberTeamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('member_team')->insert([
    		[
	    		'member_id'  => 1,
	    		'team_id'    => 1,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
	    	[
	    		'member_id'  => 2,
	    		'team_id'    => 1,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
	    	[
	    		'member_id'  => 3,
	    		'team_id'    => 2,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
	    	[
	    		'member_id'  => 4,
	    		'team_id'    => 2,
	    		'created_at' => date("Y-m-d H:i:s"),
	    		'updated_at' => date("Y-m-d H:i:s"),
	    	],
        ]);
    }
}
