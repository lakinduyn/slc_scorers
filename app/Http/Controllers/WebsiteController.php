<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Match;
use App\Tournament;
use \App\Inning;
use \App\MatchResult;
use \App\PlayerTeam;
use \App\Team;
use \App\TeamTournamentPlayer;

class WebsiteController extends Controller
{
    public function index(){
        return view('website.home');
    }
    public function matchResult(Match $match){
        $inning = $match->inning1;
        $batStats = $inning->battingStats()->orderBy('btOrderNo')->get();
        $bowlStats = $inning->bowlingStats()->orderBy('bwOrderNo')->get();
        
        return view('website.matchResult', compact('match','inning','batStats','bowlStats'));
    }
    public function inningResult(Inning $inning){
        $match = $inning->match;
        $batStats = $inning->battingStats()->orderBy('btOrderNo')->get();
        $bowlStats = $inning->bowlingStats()->orderBy('bwOrderNo')->get();
        
        //return view('website.innings', compact('match','inning','batStats','bowlStats'));
        //$dnb=\App\MatchPlayer::where('match_id',$match->id)->where('team_id',$inning->batTeam)->where('is12thMan',0)->whereNotIn('player_id', \App\BattingStat::where('inning_id',$inning->id)->pluck('player_id'))->get();
        return view('website.matchResult', compact('match','inning','batStats','bowlStats'));
    }
    public function showDomestic($level){
        $tm=Tournament::where('level',$level)->get();
        //$t=\App\Tournament::find(1)
        $length = count($tm);
        //foreach($tm as $tms){
        //int i=0;
        //$match[i]=$tms->matches;
        //i++;
        //}
        //$match = Match::orderBy('id', 'DESC')->get();
        //$mt = MatchResult::all();
        //$match = Match::where('id', $mt-)->all();
        $in= Inning::all();
        
        return view('website.clubTournaments', compact('tm') );
    }
    public function teamCard($teamId){
        $name=Team::find($teamId);
        //$tp=PlayerTeam::where('team_id',$teamId)->get();
       $tp=TeamTournamentPlayer::where('team_id',$teamId)->get();
        return view('website.teamCard', compact('tp','name'));
    }
}
