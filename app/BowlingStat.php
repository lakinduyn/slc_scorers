<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BowlingStat extends Model
{
    public function bowler(){
        return $this->hasOne(Player::class, 'id','player_id');
    }
    public function getEcon(){
        $balls=($this->overs*10) % 10;
        $over=floor($this->overs);

        $over+=($balls/6);
        
        $ecn = $this->runs/$over;
        return $ecn;
    }
}
