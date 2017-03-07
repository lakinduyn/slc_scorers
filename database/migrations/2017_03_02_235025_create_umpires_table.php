<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUmpiresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umpires', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName'); 
            $table->string('lastName');
            $table->date('dob');
            $table->string('nic');
            $table->string('regNo');
            $table->string('photoUrl');
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
        Schema::dropIfExists('umpires');
    }
}
