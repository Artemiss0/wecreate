<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Project extends Model
{
    // Table name
    protected $table = 'projects';

    public function user(){
        return $this->belongsToMany('App\User');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
            ->where('project_id', $this->id)
            ->first();
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
