<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBattingStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batting_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('inning_id')->unsigned();
            $table->foreign('inning_id')->references('id')->on('innings');
            $table->integer('player_id')->unsigned();
            $table->foreign('player_id')->references('id')->on('players');
            $table->integer('btOrderNo')->unsigned();
            $table->integer('runs')->unsigned();
            $table->integer('balls')->unsigned();
            $table->integer('fours')->unsigned()->default(0);
            $table->integer('sixes')->unsigned()->default(0);
            $table->enum('dismissalType', ['dnb', 'notout','bowled','caught','lbw','stumped','runout','retired','obstruct']);
            $table->integer('dismissalNo')->unsigned()->nullable();            
            $table->double('dismissalAtOver',4,1)->unsigned()->nullable();
            $table->integer('dismissalAtRuns')->unsigned()->nullable();
            $table->integer('dismissalBowler')->unsigned()->nullable();
            $table->foreign('dismissalBowler')->references('id')->on('players');
            $table->integer('dismissalFielder')->unsigned()->nullable();
            $table->foreign('dismissalFielder')->references('id')->on('players');
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
        Schema::dropIfExists('batting_stats');
    }
}
