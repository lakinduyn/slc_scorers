<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('format', ['50 Overs', '20 Overs','Test']);
            $table->string('venue');
            $table->date('matchStartDate');
            $table->date('matchEndDate')->nullable();
            $table->integer('team1_id')->unsigned();
            $table->foreign('team1_id')->references('id')->on('teams');
            $table->integer('team2_id')->unsigned();
            $table->foreign('team2_id')->references('id')->on('teams');
            $table->integer('tournament_id')->unsigned();
            $table->foreign('tournament_id')->references('id')->on('tournaments');
            $table->integer('pool_id')->unsigned();
            $table->foreign('pool_id')->references('id')->on('pools');

            $table->integer('umpire1')->unsigned()->nullable();
            $table->foreign('umpire1')->references('id')->on('umpires');
            $table->integer('umpire2')->unsigned()->nullable();
            $table->foreign('umpire2')->references('id')->on('umpires');
            $table->integer('scorer_id')->unsigned()->nullable();
            $table->foreign('scorer_id')->references('id')->on('scorers');
         
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
        Schema::dropIfExists('matches');
    }
}
