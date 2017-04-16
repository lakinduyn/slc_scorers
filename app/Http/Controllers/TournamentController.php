<?php

namespace App\Http\Controllers;

use App\Tournament;
use App\Team;
use App\Pool;
use App\TeamTournament;
use App\PoolTeam;
use Illuminate\Http\Request;
use DB;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = DB::table('tournaments')->get();
        $teams = DB::table('teams')->get();
        $rounds = DB::table('rounds')
                    ->join('tournaments', 'rounds.tournament_id', '=', 'tournaments.id')
                    ->select('rounds.name')
                    ->get();

        return view('tournaments.tournamentStructure',
            [
                'tournaments' => $tournaments,
                'teams' => $teams,
                'rounds' => $rounds
            ]);
    }

    public function roundsDropDown($id)
    {
        $rounds = DB::table("rounds")
                    ->where("tournament_id",$id)
                    ->select("name","id")
                    // ->distinct()
                    ->get();
                
        return json_encode($rounds);
    }

    public function poolsDropDown($id)
    {
        $pools = DB::table("pools")
                    ->where("round_id", $id)
                    ->select("name","id")
                    // ->distinct()
                    ->get();
                
        return json_encode($pools);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tournament = new Tournament;
         $tournament->name = $request->name;
         $tournament->divLevel = $request->divLevel;
         $tournament->imgUrl = $request->tournamentLogo;

         $tournament->save();

         return redirect('/admin');
    }

    public function storeTournamentTeams(Request $request)
    {
        $tournament = new Tournament;
        $tournamentID = $request->tournamentName3;
        $tournament = $tournament::where('id', $tournamentID)->firstOrFail();

        $pool = new Pool;
        $poolName = $request->pool;
        $pool = $pool::where('name', $poolName)->firstOrFail();

        $team = new Team;
        $teamName = $request->teamName;

        foreach($teamName as $tn)
        {
            $team = $team::where('name', $tn)->firstOrFail();

            $teamTournament = new TeamTournament;
            $teamTournament->tournament_id = $tournament->id;
            $teamTournament->team_id = $team->id;

            $poolTeam = new PoolTeam;
            $poolTeam->pool_id = $pool->id;
            $poolTeam->team_id = $team->id;

            $teamTournament->save();
            $poolTeam->save();
        }

        return redirect('/tournamentStructure');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Tournament $tournament)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
