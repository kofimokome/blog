<?php

namespace kofi\Http\Controllers;

use Illuminate\Http\Request;

use kofi\Http\Requests;
use kofi\User;
use kofi\Notification;
use Illuminate\Support\Facades\Storage;
use Image;
use kofi\Category;
use kofi\Comment;
use kofi\Post;
use kofi\Tag;
use Purifier;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $not = Notification::orderBy('id', 'desc')->get();
        return view('notifications.index')->withNot($not);
    }

    public function create(){
        return view('notifications.create');
    }

    public function store(Request $request){
        $not=new Notification;
        $not->message=$request->message;
        $not->from=1;
        $not->user_id=$request->user;
        $not->save();
        session()->put('msg','Notification Sent');
        return redirect()->route('notifications.index');
    }

    public function destroy($id)
    {
        $not=Notification::find($id);
        $not->delete();

        session()->put('msg','Notification Deleted');
        return redirect()->route('notifications.index');
    }
}
