<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoreCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned();
            $table->foreign('match_id')->references('id')->on('matches');
            $table->integer('umpire1')->unsigned();
            $table->foreign('umpire1')->references('id')->on('umpires');
            $table->integer('umpire2')->unsigned();
            $table->foreign('umpire2')->references('id')->on('umpires');
            $table->integer('scorer_id')->unsigned();
            $table->foreign('scorer_id')->references('id')->on('scorers');
            $table->integer('winby');
            $table->enum('wintype', ['runs', 'wickets','innings']);
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
        Schema::dropIfExists('score_cards');
    }
}
