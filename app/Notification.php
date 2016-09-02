<?php

namespace kofi;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public function posts(){
        return $this->belongsTo('kofi\Post');
    }

    public function users(){
        return $this->belongsTo('kofi\User');
    }
}
