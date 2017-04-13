<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         
         $team = Team::all();

        return view('dashboard.teamregistration', compact('team'));
         
    }
      public function addteam()
    {
        //
         
         $team = Team::all();

        return view('dashboard.addteam', compact('team'));
         
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
    public function store()
    {
        //
        $team = new Team();

        $team->name=request('teamName');
        $team->ageCat=request('ageCategory');
        $team->div=request('division');
        $team->institute_id=request('institute');

        $team->save();

        //$users = App\Team::all();

        

     return redirect('/team');

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
    public function edit(Team $team)
    {
        
         return view('dashboard.editTeam', compact('team'));
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
         $team = Team::findOrFail($id);
       $team->name = $request->input('name');
       $team->ageCat = $request->input('age');
       $team->div = $request->input('div');
       $team->institute_id = $request->input('ins');
     
       $team->save();
      return redirect('/team');
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
         $team = Team::findOrFail($id);
        $team->delete();
        //Session::flash('message', 'Successfully deleted the Team!');
        //Session::flash('flash_message', 'Team successfully deleted!');
        return redirect('/team');

    }
}
