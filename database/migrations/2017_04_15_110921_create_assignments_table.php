<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignables', function (Blueprint $table) {
            $table->integer('matchup_id')
                  ->unsigned();
            $table->integer('assignable_id')
                  ->unsigned();
            $table->string('assignable_type');

            $table->foreign('matchup_id')
                  ->references('id')
                  ->on('matchups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assignables');
    }
}
