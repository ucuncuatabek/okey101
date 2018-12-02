<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matchup extends Model
{
    protected $fillable = [
        'user_id', 'is_paired'
    ];

    public function members()
    {
        return $this->morphedByMany('App\Member', 'assignable');;
    }

    public function teams()
    {
        return $this->morphedByMany('App\Team', 'assignable');;
    }

    public function points()
    {
    	return $this->hasMany('App\Point');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
