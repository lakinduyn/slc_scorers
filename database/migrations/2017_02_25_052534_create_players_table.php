<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('regId')->nullable();
            $table->string('firstName'); //All Names other than last name
            $table->string('lastName');
            $table->string('useName')->nullable();
            $table->string('nic')->nullable();
            $table->date('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('contactNo')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->string('playingRole')->nullable();
            $table->string('batStyle');
            $table->string('bowlStyle');
            $table->string('photoUrl')->nullable();
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
        Schema::dropIfExists('players');
    }
}
