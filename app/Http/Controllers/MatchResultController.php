<?php

namespace App\Http\Controllers;

use App\MatchResult;
use Illuminate\Http\Request;
use App\Match;

class MatchResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function showMatchBasicInfo(Match $match)
    {
        //$umpires = \App\Umpire::get(['id']);
        $umpires = \App\Umpire::all();
        $scorers = \App\Scorer::all();
        $tournament = $match->tournament;
        $tou_team_1 = $tournament->players()->where('team_id','=',$match->team1_id)->get();
        $tou_team_2 = $tournament->players()->where('team_id','=',$match->team2_id)->get();
        $matchResult = $match->matchresult;

        $selected_team_1 = \App\MatchPlayer::where('match_id','=',$match->id)->where('team_id','=',$match->team1_id)->get();
        $selected_team_2 = \App\MatchPlayer::where('match_id','=',$match->id)->where('team_id','=',$match->team2_id)->get();

        return view('dashboard.matchResult', compact('match','umpires','scorers','tou_team_1','tou_team_2','matchResult','selected_team_1','selected_team_2'));
    }
    public function show(Match $match)
    {
        return view('dashboard.matchResultMain', compact('match'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function edit(MatchResult $matchResult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MatchResult $matchResult)
    {
        //
    }
    public function updateBasicInfo(Request $request, Match $match)
    {
        

        $m_id="".$match->id."";
        $matchResult=\App\MatchResult::firstOrCreate(['match_id'=>$m_id]);

        $match->umpire1=($request->umpire1=="0" ? null : $request->umpire1);
        $match->umpire2=($request->umpire2=="0" ? null : $request->umpire2);
        $match->scorer_id=($request->scorer=="0" ? null : $request->scorer);
        $match->save();

        $matchResult->match_id=$match->id;
        $matchResult->tossTeam=$request->toss;
        $matchResult->tossDecision=$request->elect;
        $matchResult->save();
        

        \App\MatchPlayer::where('match_id', $match->id)->delete();
        $team1players = $request->input('team1Players');;
        $team2players = $request->input('team2Players');;
        
        foreach ($team1players as $key=>$playerId){
           $pl=new  \App\MatchPlayer;
           $pl->player_id=$playerId;
           $pl->match_id=$match->id;
           $pl->team_id=$match->team1->id;
           $pl->save();
        }
       foreach ($team2players as $key=>$playerId){
           $pl=new  \App\MatchPlayer;
           $pl->player_id=$playerId;
           $pl->match_id=$match->id;
           $pl->team_id=$match->team2->id;
           $pl->save();
        }

        if($request->team1_cap!="0"){
            \App\MatchPlayer::where('player_id', $request->team1_cap)->update(['isCaptain' => 1]);
        }
        if($request->team1_wk!="0"){
            \App\MatchPlayer::where('player_id', $request->team1_wk)->update(['isWK' => 1]);
        }
        if($request->team1_12thMan!="0"){
            $pl=new  \App\MatchPlayer;
            $pl->player_id=$request->team1_12thMan;
            $pl->match_id=$match->id;
            $pl->team_id=$match->team1->id;
            $pl->is12thMan="1";
            $pl->save();
        }

        if($request->team2_cap!="0"){
            \App\MatchPlayer::where('player_id', $request->team2_cap)->update(['isCaptain' => 1]);
        }
        if($request->team2_wk!="0"){
            \App\MatchPlayer::where('player_id', $request->team2_wk)->update(['isWK' => 1]);
        }
        if($request->team2_12thMan!="0"){
            $pl=new  \App\MatchPlayer;
            $pl->player_id=$request->team2_12thMan;
            $pl->match_id=$match->id;
            $pl->team_id=$match->team2->id;
            $pl->is12thMan="1";
            $pl->save();
        }
        return redirect('/matchResultsMain/'.$match->id);
    }

    public function updateFinalResult(Request $request, Match $match)
    {
        $matchResult=$match->matchResult;
        if($request->wonby=="0")
        {
            $matchResult->winTeam=null;
        }
        else{
            $matchResult->winTeam=$request->wonby;
        }
        if($request->wintype=="0")
        {
            $matchResult->wintype=null;
        }
        else{
            $matchResult->wintype=$request->wonType;
        }              
        $matchResult->winMargin=$request->winMargin;
        if($request->isDuck==null){
            $matchResult->dlMethod="no";
        }
        else{
            $matchResult->dlMethod=$request->isDuck;
        }
        

        $matchResult->save();

        return back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MatchResult  $matchResult
     * @return \Illuminate\Http\Response
     */
    public function destroy(MatchResult $matchResult)
    {
        //
    }
    
}
