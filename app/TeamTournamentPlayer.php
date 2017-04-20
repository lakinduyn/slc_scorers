<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamTournamentPlayer extends Model
{
    //
    
    protected $table='team_tournament_players';
     public function getPlayer(){
        return $this->hasOne(Player::class, 'id','player_id');
    }
    public function getTeam(){
        return $this->hasOne(Team::class, 'id','team_id');
    }
}
