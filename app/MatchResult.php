<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchResult extends Model
{
    protected $guarded = [];

    public function tossWinningTeam(){
        return $this->hasOne(Team::class, 'id','tossTeam');
    }
    public function winningTeam(){
        return $this->hasOne(Team::class, 'id','winTeam');

        //
    }
}
