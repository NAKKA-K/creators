<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSkillTag extends Model
{
    protected $fillable = [
        'event_id', 'skill_tag_id'
    ];

    public function event() {
        return $this->belongsTo('App\Event');
    }

    public function skill_tag() {
        return $this->belongsTo('App\SkillTag');
    }
}
