<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkillTag extends Model
{
    protected $fillable = [
        'name',
    ];

    public function events() {
        return $this->belongsToMany('App\Event');
    }
}
