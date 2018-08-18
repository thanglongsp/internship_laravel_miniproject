<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Matches extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('matches',function($table){
            $table->increments('id');
            $table->string('team1');
            $table->string('team2');
            $table->string('banner');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->dateTime('time_play');
            $table->integer('result');
            $table->integer('real_result');
            $table->float('ratio_1_win');
            $table->float('ratio_1_lose');
            $table->float('ratio_equal');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('matches');
    }
}
