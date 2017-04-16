<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inning;
use App\Match;

class InningsController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Inning $inning)
    {
        $batStats = $inning->battingStats()->orderBy('btOrderNo')->get();
        $bowlStats = $inning->bowlingStats()->orderBy('bwOrderNo')->get();
        $match = $inning->match;
        $battingTeam = $match->players()->where('team_id','=',$inning->battingTeam->id)->get();
        $bowlingTeam = $match->players()->where('team_id','=',$inning->bowlingTeam()->id)->get();
        return view('dashboard.updateInning', compact('inning','batStats','bowlStats','battingTeam','bowlingTeam') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inning $inning)
    {
        $inning->maxOvers=$request->maxovers;
        $inning->oversPlayed=$request->playedovers;
        $inning->wicketsFallen=$request->wicketsfallen;
        $inning->total=$request->total;

        $inning->nb=$request->noballs;
        $inning->wide=$request->wides;
        $inning->legbyes=$request->legbyes;
        $inning->byes=$request->byes;
        $inning->penalties=$request->penalties;

        $inning->save();

        return back();
        
    }
    public function updateBatsman(Request $request, Inning $inning)
    {
        $batStId=$request->batStatId;
        $batStat;
        if($batStId=="0"){
            $batStat=new \App\BattingStat;
        }
        else{
            $batStat=\App\BattingStat::find($batStId);
        }
        $batStat->inning_id=$inning->id;
        $batStat->player_id=$request->batsman;
        $batStat->btOrderNo=$request->inat;
        $batStat->runs=$request->runs;
        $batStat->balls=$request->balls;
        $batStat->fours=$request->fours;
        $batStat->sixes=$request->sixes;

        $batStat->dismissalType=$request->dis_type;
        $batStat->dismissalNo=$request->dis_no;
        $batStat->dismissalAtOver=$request->dis_at_over;
        $batStat->dismissalAtRuns=$request->dis_at_runs;
        if ($request->dis_bowler!="0")
        {
            $batStat->dismissalBowler=$request->dis_bowler;
        }
        else {
            $batStat->dismissalBowler=null;
        }
        if ($request->dis_fielder!="0")
        {
            $batStat->dismissalFielder=$request->dis_fielder;
        }
        else {
            $batStat->dismissalFielder=null;
        }
        
        $batStat->save();

        return back();
        
    }
    public function deleteBatsman(Request $request)
    {
        $batStId=$request->batStatId;
        \App\BattingStat::destroy($batStId);
        return back();
    }
    public function updateBowler(Request $request, Inning $inning)
    {
        $bowlStId=$request->bowlStatId;
        $bowlStat;
        if($bowlStId=="0"){
            $bowlStat=new \App\BowlingStat;
        }
        else{
            $bowlStat=\App\BowlingStat::find($bowlStId);
        }
        $bowlStat->inning_id=$inning->id;
        $bowlStat->player_id=$request->bowler;
        $bowlStat->bwOrderNo=$request->bowlat;
        $bowlStat->wide=$request->bowl_wide;
        $bowlStat->nb=$request->bowl_no;
        $bowlStat->overs=$request->bowl_overs;
        $bowlStat->maiden=$request->bowl_maidens;
        $bowlStat->runs=$request->bowl_runs;
        $bowlStat->wickets=$request->bowl_wickets;
       
        $bowlStat->save();

        return back();
        
    }
    public function deleteBowler(Request $request)
    {
        $bowlStId=$request->bowlStatId;
        \App\BowlingStat::destroy($bowlStId);
        return back();
    }
    public function newInning(Request $request, Match $match)
    {
        $inning=new \App\Inning;

        $inning->match_id=$match->id;
        $inning->inningNo=$request->inningNo;
        $inning->batTeam=$request->batTeam;
        $inning->save();

        return back();
    }
    public function resetInning(Request $request, Inning $inning)
    {
        \App\BattingStat::where('inning_id', '=', $inning->id)->delete();
        \App\BowlingStat::where('inning_id', '=', $inning->id)->delete();
        $inning->delete();
        return back();
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
