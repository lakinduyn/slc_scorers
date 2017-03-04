<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('name'); 
            $table->integer('ageCat')->nullable();
            $table->enum('div', ['0','1', '2','3', 'A', 'B', 'C', 'D', 'E', 'F']);
            $table->timestamps();

            $table->integer('institute_id')->unsigned();
            $table->foreign('institute_id')->references('id')->on('institutes');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
