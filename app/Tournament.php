<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function matches()
    {
        return $this->hasMany(Match::class);
    }
    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
    public function players(){
        return $this->belongsToMany('App\Player','team_tournament_players')->withPivot('team_id');
    }
    public function playersOfTeam(Team $team){
        return $this->belongsToMany('App\Player','team_tournament_players')->withPivot('team_id','=',$team->id);
    }
}
