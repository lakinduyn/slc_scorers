<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PointsTable extends Model
{
    public function pool()
    {
        return $this->belongsTo(Pool::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
