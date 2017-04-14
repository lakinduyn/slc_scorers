<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoolTeam extends Model
{
    //pool team
    public function pool(){
        return $this->hasOne(Pool::class, 'id','pool_id');
    }
    public function team(){
        return $this->hasOne(Team::class, 'id','team_id');
    }
}
