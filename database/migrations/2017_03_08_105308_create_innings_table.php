<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('innings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('match_id')->unsigned()->nullable();
            $table->foreign('match_id')->references('id')->on('matches');
            $table->integer('inningNo')->unsigned()->nullable();
            $table->integer('batTeam')->unsigned();
            $table->foreign('batTeam')->references('id')->on('teams');
            $table->double('maxOvers',4,1)->default(0);
            $table->double('oversPlayed',4,1)->default(0);
            $table->integer('total')->unsigned()->default(0);
            $table->integer('wicketsFallen')->unsigned()->default(0);
            $table->enum('isDec', ['yes', 'no'])->default('no');
            $table->integer('nb')->unsigned()->default(0);
            $table->integer('wide')->unsigned()->default(0);
            $table->integer('legbyes')->unsigned()->default(0);
            $table->integer('byes')->unsigned()->default(0);
            $table->integer('penalties')->unsigned()->default(0);
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
        Schema::dropIfExists('innings');
    }
}
