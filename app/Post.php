<?php

namespace kofi;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    protected $fillable = ['title'];
    public function users(){
        return $this->belongsTo('kofi\User');
    }

    public function category(){
        return $this->belongsTo('kofi\Category');
    }
    public function tags(){
        return $this->belongsToMany('kofi\Tag');
    }
    public function comments(){
        return $this->hasMany('kofi\Comment');
    }

    public function notification(){
        return $this->hasMany('kofi\Notification');
    }

    //This is for the automatic slug function
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
