<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pool extends Model
{
    public function round()
    {
        return $this->belongsTo(Round::class);
    }
}
