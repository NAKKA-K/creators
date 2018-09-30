<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    protected $fillable = [
        'body',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}