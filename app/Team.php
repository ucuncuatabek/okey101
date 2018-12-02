<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name'
    ];

    public function members()
    {
        return $this->belongsToMany('App\Member');
    }

    public function matchups()
    {
        return $this->morphToMany('App\Matchup', 'assignable');
    }
}
