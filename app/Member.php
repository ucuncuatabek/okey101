<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
	protected $fillable = [
        'name'
    ];

    public function teams()
    {
        return $this->belongsToMany('App\Team');
    }

    public function matchups()
    {
        return $this->morphToMany('App\Matchup', 'assignable');
    }

    public function points()
    {
        return $this->hasMany('App\Point');
    }
}
