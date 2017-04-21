<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\PlayerTeam;
use App\Team;
use App\Tournament;
use App\TeamTournamentPlayer;
use Illuminate\Support\Facades\Input;
use DB;
class PlayerController extends Controller
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
    public function search()
    {
        $ply = Player::all();

        return view('dashboard.searchPlayer', compact('ply'));

    }
      public function search1()
    {
        $ply = Player::all();
        $team=Team::all();

        return view('dashboard.playerTeamRegister', compact('ply','team'));

    }
    public function search2()
    {
        $pt = PlayerTeam::all();
        $tm=Tournament::all();
        $ply=Player::all();
        $teams=Team::all();

        return view('dashboard.tournamentTeamPlayers', compact('tm','teams','ply'));

    }
  
  public function storeTournamentPlayer(Request $request)
    {
        
        $myDate =date("Y-m-d");
        
        $add = $_POST['add'];
        $length = count($add);
        for ($i = 0; $i < $length; $i++) {
         // print $add[$i];
        $ttp[$i] = new TeamTournamentPlayer;
        $ttp[$i]->player_id=$add[$i];
        $ttp[$i]->team_id=request('teamId');
        $ttp[$i]->tournament_id=request('tournamentId');
        //$ttp[$i]->joinDate=$myDate;
        $ttp[$i]->save();
        }
        return redirect('/admin');

    }
    public function storeTeam(Request $request)
    {
        $myDate =date("Y-m-d");
        
        $add = $_POST['add'];
        $length = count($add);
        for ($i = 0; $i < $length; $i++) {
         // print $add[$i];
        $pt[$i] = new PlayerTeam;
        $pt[$i]->player_id=$add[$i];
        $pt[$i]->team_id=request('teamId');
        $pt[$i]->joinDate=$myDate;
        $pt[$i]->save();
        }
        //for(int i=0;i<$add.length;i++){
        /*foreach ($add as $id){
         
        $pt[i] = new PlayerTeam;
        $pt[i]->player_id=$id;
        $pt[i]->team_id=request('teamId');
        $pt[i]->joinDate=$myDate;
        $pt[i]->save();
     
        }*/
        return redirect('/admin');

    }
  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('dashboard.addPlayer');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $player = new Player;
      $pt = new PlayerTeam;// object from model player team
      $myDate =time();// date nd time
      $name=request('firstName');
      $lname=request('lastName');

      if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $ext = strtolower(substr(strrchr($file_name, '.'), 1)); 
      $newfilename=$name. '' .$lname.''.$myDate.".".$ext;
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      //$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
     // $expensions= array("jpeg","jpg","png");
      
     // if(in_array($file_ext,$expensions)=== false){
        // $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      //}
    
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"resources/images/players/".$newfilename);
         echo "Success";
      }
      
   }
           
        $this->validate(request(),[
            'registrationNo'=>'required',
            'lastName'=>'required'
        ]);
        
        $player->regId=request('registrationNo');
        $player->nic=request('nic');
        $player->firstName=request('firstName');
        $player->lastName=request('lastName');
        $player->photoUrl=$newfilename;
        //testing code
        $player->useName=request('otherNames');
        $player->playingRole=request('playerRole');
        $player->dob=request('dob');
        $player->height=request('height');
        $player->weight=request('weight');
        $player->batStyle=request('battingStyle');
        $player->bowlStyle=request('bowlingStyle');
        $player->contactNo=request('contactNo');
        $pt->team_id=request('teamId');
        $pt->joinDate=$myDate;
    
        $player->save();
        //$pt->save();
        
        
 
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
    public function edit(Player $player)
    {
        //
        return view('dashboard.editPlayer', compact('player'));
        
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
        $player = Player::findOrFail($id);
       $myDate =time();// date nd time

      if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $ext = strtolower(substr(strrchr($file_name, '.'), 1)); 
      $newfilename=$myDate.".".$ext;
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
       if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../images/players/".$newfilename);
         $player->photoUrl=$newfilename;
         echo "Success";
      }
      }

       
       $player->regId=request('registrationNo');
       $player->firstName = $request->input('otherNames');
       $player->lastName = $request->input('lastName');
       $player->dob = $request->input('dob');
       $player->playingRole=request('playerRole');
       $player->nic = $request->input('nic');
       $player->contactNo = $request->input('contactNo');
       $player->height=request('height');
       $player->weight=request('weight');
       $player->batStyle=request('battingStyle');
       $player->bowlStyle=request('bowlingStyle');
       $player->contactNo=request('contactNo');


       $player->save();

       return redirect('/searchPlayer');


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
        $player = Player::findOrFail($id);
        $player->delete();

        return redirect('/searchPlayer');
    }


    
}
