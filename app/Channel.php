<?php

namespace kofi;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public function members(){
        return $this->hasMany('kofi\Member');
    }

    public function messages(){
        return $this->hasMany('kofi\Message');
    }
}
