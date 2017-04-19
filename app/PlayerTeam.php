<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PlayerTeam extends Model
{
    //
    protected $table='player_team';
    public function getPlayer(){
        return $this->hasOne(Player::class, 'id','player_id');
    }
    public function getTeam(){
        return $this->hasOne(Team::class, 'id','team_id');
    }
    
}
