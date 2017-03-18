<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Player extends Model
{
    public function teams()
    {
       return $this->belongsToMany('App\Team')->withPivot('joinDate','endDate');
    }
    public function nameWithInits()
    {
        $fNames=str_word_count($this->firstName,1);
        $inits="";
        foreach($fNames as $fName)
        {
            $inits.=substr($fName,0,1);
            $inits.=".";
        }
        return $inits.=$this->lastName;
    }
}


