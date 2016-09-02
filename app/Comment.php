<?php

namespace kofi;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function posts(){
        return $this->belongsTo('kofi\Post');
    }

    public function user(){
        return $this->belongsTo('kofi\User');
    }
}
