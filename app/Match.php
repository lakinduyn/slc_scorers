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
        return $this->hasOne('App\MatchResult', 'id', 'match_id');
    }
    public function team1(){
        return $this->hasOne(Team::class, 'id','team1_id');
    }
    public function team2(){
        return $this->hasOne(Team::class, 'id','team2_id');
    }
}
