<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_team', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')
                  ->unsigned();
            $table->integer('team_id')
                  ->unsigned();

            $table->timestamps();

            $table->foreign('member_id')
                  ->references('id')
                  ->on('members');

            $table->foreign('team_id')
                  ->references('id')
                  ->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_team');
    }
}
