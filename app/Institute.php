<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    //
    protected $guarded = [];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }


    public static function getAllInstitutes(){

        return static::table('institutes')->get();
    }


}
