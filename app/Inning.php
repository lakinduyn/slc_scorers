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
    public function getScore(){
        $score=$this->total."/".$this->wicketsFallen;
        if($this->isDec=="yes")
        {
            $score.="d";
        }
        return $score;
    }
    public function getRunRate(){
        $balls=($this->oversPlayed*10) % 10;
        $overs=floor($this->oversPlayed);

        $overs+=($balls/6);

        $rr=$this->total/$overs;

        return $rr;
    }

    public function getDnbList(){
        $dnb=\App\MatchPlayer::where('match_id',$this->match->id)->where('team_id',$this->batTeam)->where('is12thMan',0)->whereNotIn('player_id', \App\BattingStat::where('inning_id',$this->id)->pluck('player_id'))->get();

        $dnbList="";

        foreach ($dnb as $dnbBat)
        {
			$dnbList=$dnbList."".$dnbBat->player->nameWithInits()." | ";
        }
        return 	$dnbList;
    }
    public function getFallOfWickets(){
        $bats=\App\BattingStat::where('inning_id',$this->id)->whereIn('dismissalNo',[1,2,3,4,5,6,7,8,9,10])->orderBy('dismissalNo')->get();

        $disList="";

        foreach ($bats as $bat)
        {
			$disList=$disList."".$bat->dismissalNo."-".$bat->dismissalAtRuns." (".$bat->batsman->nameWithInits().", ".$bat->dismissalAtOver." ov) | ";
        }
        return 	$disList;
    }
    
}

