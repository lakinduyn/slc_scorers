<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function matches()
    {
        return $this->hasMany(Match::class);
    }
    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
}
