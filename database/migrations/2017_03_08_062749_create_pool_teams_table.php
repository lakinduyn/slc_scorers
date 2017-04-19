<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePoolTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pool_teams', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pool_id')->unsigned();
            $table->foreign('pool_id')->references('id')->on('pools')->onDelete('cascade');
            $table->integer('team_id')->unsigned();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
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
        Schema::dropIfExists('pool_teams');
    }
}
