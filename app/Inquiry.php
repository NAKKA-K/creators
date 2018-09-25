<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $fillable = [
        'title', 'body',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
