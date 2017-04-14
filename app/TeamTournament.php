<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamTournament extends Model
{
    //team tou
    public function team(){
        return $this->hasOne(Team::class, 'id','team_id');
    }
    public function tournament(){
        return $this->hasOne(Tournament::class, 'id','tournament_id');
    }
}
