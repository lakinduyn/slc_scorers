<?php

namespace App\Http\Controllers;

use App\Pool;
use App\Round;
use Illuminate\Http\Request;

class PoolController extends Controller
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
        $pool = new Pool;
        $pool->name = $request->poolName;

        // $tournament = new Tournament;
        $tournamentID = $request->tournamentName2;

        
        $round = new Round;
        $roundName = $request->round;
        $round = $round::where([['name', $roundName],
                    ['tournament_id', $tournamentID]])
                    ->firstOrFail();
        $round->pools()->save($pool);

        return redirect('/tournamentStructure');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function show(Pool $pool)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function edit(Pool $pool)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pool $pool)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pool  $pool
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pool $pool)
    {
        //
    }
}
