<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BowlingStat extends Model
{
    public function bowler(){
        return $this->hasOne(Player::class, 'id','player_id');
    }
}
