<?php

namespace App\Http\Controllers;

use App\Round;
use App\Tournament;
use Illuminate\Http\Request;

class RoundController extends Controller
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
        // $rounds = DB::table('rounds')->get();
        // $teams = DB::table('teams')->get();

        // return view('tournaments.tournamentStructure', ['tournaments' => $tournaments, 'teams' => $teams]);
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
        $round = new Round;
        $round->name = $request->roundName;
        $isKnockout = $request->isKnockout;

        if ($isKnockout == 'league')
        {
            $round->isKnockout = 0;
            $round->isPointsTable = 1;
        }
        else
        {
            $round->isKnockout = 1;
            $round->isPointsTable = 0;
        };

        $tournament = new Tournament;
        $tournamentName = $request->tournamentName1;
        $tournament = $tournament::where('name', $tournamentName)->firstOrFail();
        $tournament->rounds()->save($round);
        
        return redirect('/tournamentStructure');
        // return redirect()->action('PoolController@store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
