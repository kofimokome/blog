<?php

namespace kofi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //User to posts relationship
    public function posts(){
        return $this->hasMany('kofi\Post');
    }

    public function comments(){
        return $this->hasMany('kofi\Comment');
    }

    public function notifications(){
        return $this->hasMany('kofi\Notification');
    }

    public function messages(){
        return $this->hasMany('kofi\Message');
    }

    public function members(){
        return $this->hasMany('kofi\Member');
    }
}

