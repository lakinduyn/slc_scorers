<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umpire extends Model
{
    public function getFullName(){
        return $this->firstName.' '.$this->lastName;
    }
}
