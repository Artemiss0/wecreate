<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Tag extends Model
{
    //
    public function projects(){
        return $this->belongsToMany('App\Project');
    }
}
