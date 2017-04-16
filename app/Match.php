<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Match extends Model
{
    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }
    public function matchresult(){
        return $this->hasOne(MatchResult::class);
    }
    public function team1(){
        return $this->hasOne(Team::class, 'id','team1_id');
    }
    public function team2(){
        return $this->hasOne(Team::class, 'id','team2_id');
    }
    public function innings()
    {
        return $this->hasMany(Inning::class);
    }
    public function players(){
        return $this->belongsToMany('App\Player','match_players')->withPivot('team_id');
    }
    public function inning1()
    {
        return $this->hasOne(Inning::class)->where('inningNo','=','1');
    }
    public function inning2()
    {
        return $this->hasOne(Inning::class)->where('inningNo','=','2');
    }
    public function inning3()
    {
        return $this->hasOne(Inning::class)->where('inningNo','=','3');
    }
    public function inning4()
    {
        return $this->hasOne(Inning::class)->where('inningNo','=','4');
    }
}
