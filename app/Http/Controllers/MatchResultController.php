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
    public function show(Match $match)
    {
        //$umpires = \App\Umpire::get(['id']);
        $umpires = \App\Umpire::all();
        $scorers = \App\Scorer::all();
        $tournament = $match->tournament;
        $tou_team_1 = $tournament->players()->where('team_id','=',$match->team1_id)->get();
        $tou_team_2 = $tournament->players()->where('team_id','=',$match->team2_id)->get();

        return view('dashboard.matchResult', compact('match','umpires','scorers','tou_team_1','tou_team_2'));
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
