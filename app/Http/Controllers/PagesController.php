<?php

namespace kofi\Http\Controllers;

use kofi\Http\Requests;
use kofi\Post;
use kofi\Category;


class PagesController extends Controller
{
    public function getIndex()
    {
        return view('pages.index');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function getServices()
    {
        return view('pages.services');
    }

    public function getProducts()
    {
        return view('pages.products');
    }

    public function getBlog()
    {
        $posts=Post::orderBy('id','desc')->paginate(6);
        return view('pages.blog')->withPosts($posts);
    }
}
