<?php

namespace kofi;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function users(){
        return $this->belongsTo('Kofi\User');
    }
}
