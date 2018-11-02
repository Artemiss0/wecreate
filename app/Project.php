<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Table name
    protected $table = 'projects';

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
