<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScoreCard extends Model
{
    public function match()
    {
       return $this->belongsTo(Match::class);
    }
}
