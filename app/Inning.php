<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inning extends Model
{
    public function match()
    {
        return $this->belongsTo(Match::class);
    }
    public function battingStats()
    {
        return $this->hasMany(BattingStat::class);
    }
    public function bowlingStats()
    {
        return $this->hasMany(BowlingStat::class);
    }
    public function battingTeam(){
        return $this->hasOne(Team::class, 'id','batTeam');
    }
    public function bowlingTeam(){
        $batId=$this->battingTeam->id;
        $mat=$this->match;
        if ($batId!=$mat->team1->id){
            return Team::find($mat->team1->id);
        }
        else{
            return Team::find($mat->team2->id);;
        }
    }
}
