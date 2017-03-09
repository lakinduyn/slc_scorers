<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBowlingStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bowling_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inning_id')->unsigned();
            $table->foreign('inning_id')->references('id')->on('innings');
            $table->integer('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players');
            $table->integer('bwOrderNo')->unsigned();
            $table->integer('wide')->unsigned()->default(0);
            $table->integer('nb')->unsigned()->default(0);         
            $table->double('overs',4,1)->unsigned();
            $table->integer('maiden')->unsigned()->default(0);
            $table->integer('runs')->unsigned();
            $table->integer('wickets')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bowling_stats');
    }
}
