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
    public function getMatchResultSentence(){
        $winType = $this->matchresult->wintype;
        $winMargin = $this->matchresult->winMargin;
        $wonTeam=$this->matchResult->winningTeam;
        $sentence;
        if($winType=="wickets"||$winType=="runs")
        {
            if($winMargin!=1){
                $sentence = $wonTeam->institute->name." won by ".$winMargin." ".$winType."";
            }
            else if ($winType=="wickets"){
                $sentence = $wonTeam->institute->name." won by 1 wicket";
            }
            else if ($winType=="runs"){
                $sentence = $wonTeam->institute->name." won by 1 run";
            }

            if($this->matchresult->dlMethod=="yes"){
                $sentence.=" (D/L Method)";
            }            
        }
        else if($winType=="innings")
        {
            $sentence = $wonTeam->institute->name." won by an Inning & ".$winMargin." runs";
        }
        else if($winType=="tie")
        {
            $sentence = "Match Tied";
            if($this->matchresult->dlMethod=="yes"){
                $sentence.=" (D/L Method)";
            }   
        }
        else if($winType=="tie")
        {
            $sentence = "No Result";
        }
        else if($winType=="tie")
        {
            $sentence = "Match Drawn";
        }
        return $sentence;
        //matchResult->winningTeam->institute->name
    }
    public function getBatFirstTeamScores(){
        $scores=$this->inning1->total."/".$this->inning1->wicketsFallen;

        if($this->format=="Test"){
            if($this->inning3!=null){
                if($this->inning3->batTeam==$this->inning1->batTeam){
                    $scores=$scores." & ".$this->inning3->total."/".$this->inning3->wicketsFallen;
                }
            }
            if($this->inning4!=null){
                if($this->inning4->batTeam==$this->inning1->batTeam){
                    $scores=$scores." & ".$this->inning4->total."/".$this->inning4->wicketsFallen;
                }
            }
        }
        return $scores;
    }
    public function getBatSecondTeamScores(){

        $scores=$this->inning2->total."/".$this->inning2->wicketsFallen;

        if($this->format=="Test"){
            if($this->inning3!=null){
                if($this->inning3->batTeam==$this->inning2->batTeam){
                    $scores=$scores." & ".$this->inning3->total."/".$this->inning3->wicketsFallen;
                }
            }
            if($this->inning4!=null){
                if($this->inning4->batTeam==$this->inning2->batTeam){
                    $scores=$scores." & ".$this->inning4->total."/".$this->inning4->wicketsFallen;
                }
            }
        }
        return $scores;
    }

    public function getTossSentence(){
        return $this->matchresult->tossWinningTeam->institute->name." (".$this->matchresult->tossWinningTeam->name.") won the toss and decided to ".$this->matchresult->tossDecision;
    }

    public function getUmpire1(){
        return $this->hasOne(Umpire::class, 'id','umpire1');
    }
    public function getUmpire2(){
        return $this->hasOne(Umpire::class, 'id','umpire2');
    }
    public function getScorer(){
        return $this->hasOne(Scorer::class, 'id','scorer_id');
    }
    //testcode
    public function getTeam1(){
        return $this->hasOne(Team::class, 'id','team1_id');
    }
    public function getTeam2(){
        return $this->hasOne(Team::class, 'id','team2_id');
    }
    public function getTournament(){
        return $this->hasOne(Tournament::class, 'id','tournament_id');
    }
    public function getStatus(){
       return $this->matchresult;
    }
    public function getMatchDates(){
        $dates=$this->matchStartDate;
        if($this->format=="Test"){
            $dates=$dates." - ".$this->matchEndDate;
        }
        return $dates;
    }
}
