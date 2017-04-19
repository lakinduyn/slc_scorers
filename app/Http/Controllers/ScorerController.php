<?php

namespace App\Http\Controllers;

use App\Scorer;
use Illuminate\Http\Request;

class ScorerController extends Controller
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
        return view('dashboard.createScorer');
    }
    public function search()
    {
        $scorer = Scorer::all();

        return view('dashboard.searchScorer', compact('scorer'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $scorer = new Scorer;
         $scorer->lastName = $request->lastName;
         $scorer->firstName = $request->firstName;

         $scorer->save();

         return redirect('/admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Scorer  $scorer
     * @return \Illuminate\Http\Response
     */
    public function show(Scorer $scorer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Scorer  $scorer
     * @return \Illuminate\Http\Response
     */
    public function edit(Scorer $scorer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Scorer  $scorer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scorer $scorer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Scorer  $scorer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scorer $scorer)
    {
        //
    }
}
