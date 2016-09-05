<?php

namespace kofi;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function users(){
        return $this->belongsTo('kofi\User');
    }

    public function channels(){
        return $this->belongsTo('kofi\Channel');
    }
}
