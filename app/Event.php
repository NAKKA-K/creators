<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function participants() {
        return $this->hasMany('App\EventParticipant');
    }
}
