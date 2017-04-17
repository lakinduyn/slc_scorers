<?php

namespace App\Http\Controllers;

use App\Match;
use Illuminate\Http\Request;

use DB;

class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $tournaments = DB::table('tournaments')->get();
        $pools = DB::table('pools')->get();
        $teams = DB::table('teams')->get();
        // $rounds = DB::table('rounds')
        //             ->join('tournaments', 'rounds.tournament_id', '=', 'tournaments.id')
        //             ->select('rounds.name')
        //             ->get();
        $matches = DB::table('matches')
                    ->orderBy('id', 'desc')
                    ->get();

        // return view('tournaments.matchSchedule', compact('matches'));

        return view('tournaments.matchSchedule',
            [
                'tournaments' => $tournaments,
                'pools' => $pools,
                'teams' => $teams,
                'matches' => $matches
            ]);
    }

    public function poolsDropDown($id)
    {
        // echo "<script>console.log( 'Debug Objects: ' );</script>";
        // $round = DB::table('rounds')
        //             ->where('tournament_id', $id)
        //             ->firstOrFail();

        // $roundID = $round->id;

        // echo "<script>console.log( 'Debug Objects: " . $roundID . "' );</script>";

        // $pools = DB::table("pools")
        //             ->where("round_id", $roundID)
        //             ->select("name","id")
        //             // ->distinct()
        //             ->get();
                
        // return json_encode($pools);
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
        $match = new Match;
        $match->name = $request->matchName;
        $match->format = $request->format;
        $match->venue = $request->venue;
        $match->matchStartDate = $request->startDate;
        $match->matchEndDate = $request->endDate;
        $match->team1_id = $request->team1;
        $match->team2_id = $request->team2;
        $match->tournament_id = $request->tournamentID;
        $match->pool_id = $request->poolID;

        $match->save();

        return redirect('/matchSchedule');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
