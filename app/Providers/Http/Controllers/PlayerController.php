<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;

class PlayerController extends Controller
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
    public function search()
    {
        $ply = Player::all();

        return view('players.searchPlayer', compact('ply'));

    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('players.addPlayer');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //Request $request
        //dd(request()->all());
        $this->validate(request(),[
            'registrationNo'=>'required',
            'lastName'=>'required'
        ]);
        $player = new Player;

        $player->firstName=request('otherNames');
        $player->lastName=request('lastName');
        
        //testing code
        $player->useName=request('otherNames');
        
        $player->playingRole=request('otherNames');
        $player->dob=request('DOB');
        $player->batStyle=request('lastName');
        $player->bowlStyle=request('otherNames');
        $player->regId=request('registrationNo');
        $player->save();
        
        /*$Player = new Player;

        Player::create(request() -> all());

        //$institute -> save();
 */
        return redirect('/admin');
       


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
