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
    public function strikeRate(){
        $strRate=($this->runs/$this->balls)*100;
        return $strRate;
    }
}
