<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MatchPlayer extends Model
{
    public function player(){
        return $this->hasOne(Player::class, 'id','player_id');
    }
}
