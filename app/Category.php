<?php

namespace kofi;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';

    //relationships

    public function posts(){
        return $this->hasMany('kofi\Post');
    }
}
