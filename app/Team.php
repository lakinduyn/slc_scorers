<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }

    public function players()
    {
       return $this->belongsToMany('App\Player')->withPivot('joinDate','endDate');
    }
    public function getInstitute(){
        return $this->hasOne(Institute::class, 'id','institute_id');
    }
}
