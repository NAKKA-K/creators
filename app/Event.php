<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'readme',
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function participants() {
        return $this->hasMany('App\EventParticipant');
    }
}
