<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Match;
use \App\Inning;

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
}
