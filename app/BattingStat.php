<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BattingStat extends Model
{
    public function batsman(){
        return $this->hasOne(Player::class, 'id','player_id');
    }
    public function bowler(){
        return $this->hasOne(Player::class, 'id','dismissalBowler');
    }
    public function fielder(){
        return $this->hasOne(Player::class, 'id','dismissalFielder');
    }
}
