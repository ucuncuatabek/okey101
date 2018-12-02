<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = [
        'matchup_id', 'member_id', 'point', 'round', 'note'
    ];

    public function matchup()
    {
        return $this->belongsTo('App\Matchup');
    }

    public function members()
    {
        return $this->belongsTo('App\Member');
    }
}
