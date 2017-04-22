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
    public function __construct(){
        $this->middleware('auth');
    }
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

        $teams = DB::table('team_tournaments')
                    ->where('tournament_id', $id)
                    ->select('team_id')
                    ->join('teams', 'team_tournaments.team_id', '=', 'teams.id')
                    ->select('teams.name','teams.id')
                    ->get();

        $data = array($rounds, $teams);
                
        return json_encode($data);
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
     public function search()
    {
        $tm = Tournament::all();
        $teams=Team::all();
        return view('dashboard.tournamentTeams', compact('tm','teams'));

    }
      public function storeTeam(Request $request)
    {
        $tournamentID = $request->tournamentID;
        $teamID = $request->add;

        foreach ($teamID as $tid)
        {
            $teamTournament = new TeamTournament;
            $teamTournament->tournament_id = $tournamentID;
            $teamTournament->team_id = $tid;
            $teamTournament->save();
        }

        return redirect('/addTournamentTeams');
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
        $myDate =time();// date nd time
        $name=request('name');
        $type=request('level');


        $this->file = $_FILES['image'];
      if(file_exists($this->file['tmp_name'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $ext = strtolower(substr(strrchr($file_name, '.'), 1)); 
      $newfilename=$name. '' .$type.''.$myDate.".".$ext;
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
   
         move_uploaded_file($file_tmp,"resources/images/tournaments/".$newfilename);
         
          $tournament->imgUrl=$newfilename;
      
      
   }
        $tournament->name = $request->name;
        $tournament->level = $request->level;
        $tournament->format = $request->format;
        $tournament->division = $request->division;
        //$tournament->imgUrl = $request->tournamentLogo;

        $tournament->save();

        return redirect('/admin');
    }

    public function storeTournamentTeams(Request $request)
    {
        // $tournament = new Tournament;
        // $tournamentID = $request->tournamentName3;
        // $tournament = $tournament::where('id', $tournamentID)->firstOrFail();

        $roundID = $request->round2;

        $pool = new Pool;
        $poolName = $request->pool;
        $pool = $pool::where([['name', $poolName],
                    ['round_id', $roundID]])
                    ->firstOrFail();

        $team = new Team;
        $teamName = $request->teamName;

        foreach($teamName as $tn)
        {
            $team = $team::where('name', $tn)->firstOrFail();

            // $teamTournament = new TeamTournament;
            // $teamTournament->tournament_id = $tournament->id;
            // $teamTournament->team_id = $team->id;

            $poolTeam = new PoolTeam;
            $poolTeam->pool_id = $pool->id;
            $poolTeam->team_id = $team->id;

            // $teamTournament->save();
            $poolTeam->save();
        }

        return redirect('/setTournament');
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
