<?php

namespace kofi\Http\Controllers;

use Illuminate\Http\Request;

use kofi\Http\Requests;

use kofi\Post;

class BlogController extends Controller
{
    public function getSingle($slug){
        //find slug
        $post=Post::where('slug','=',$slug)->first();

        //return view
        return view('posts.show')->withPost($post);
    }
    public function getIndex(){
        $posts=Post::paginate(10);
        return view("blog.index")->withPosts($posts);
    }
}
