<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = [
        'user_id', 'provider', 'provider_id', 'access_token',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
