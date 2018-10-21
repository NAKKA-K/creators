<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventSkillTag extends Model
{
    protected $table = 'event_skill_tag';

    protected $fillable = [
        'event_id', 'skill_tag_id'
    ];

    public function event() {
        return $this->belongsTo('App\Event');
    }

    public function skillTag() {
        return $this->belongsTo('App\SkillTag');
    }
}
