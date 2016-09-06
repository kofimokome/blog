<?php

namespace kofi\Http\Controllers;

use Illuminate\Http\Request;
use kofi\Http\Requests;
use kofi\User;
use Purifier;
use Image;
use Illuminate\Support\Facades\Storage;
use kofi\Post;
use kofi\Comment;
use kofi\Member;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware($this->authMiddleware());
    }

    //

    public function index()
    {
        $user=User::all();
        return view('users.index')->withUser($user);
    }

    public function admin($id){
        $post=Post::all();
        $admin=User::find($id);
        return view('users.show')->withPost($post)->withAdmin($admin);
    }

    public function show()
    {
        $post=Post::all();
        return view('users.show')->withPost($post);
    }

    public function edit($id)
    {
        $user=User::find($id);
        return view('users.edit')->withUser($user);
    }

    public function update(Request $request, $id)
    {
        //data validation

        $this->validate($request,array(
            'name'=>'required|max:20|min:5',
            'email'=>"required|email",
            'picture'=>'image'
        ) );
        //} --for the else
        //save data
        $user= User::find($id);
        $user->name=Purifier::clean($request->name);
        $user->email=$request->input('email');
        //added a photo
        if($request->hasfile('picture')){
            //new photo
            $image=$request->file('picture');
            $filename=$user->id . '.' . $image->getClientOriginalExtension();//you can use user->id for profile pics
            $location=public_path('profiles/'. $filename);

            Image::make($image)->save($location);// you can add ->resize(800,400)
            $old=$user->picture;

            //update
            $user->picture=$filename;
            //delete old photo
            Storage::delete($old);
        }
        //set success notification
        $user->save();
        session()->put('msg','Profile Updated');
        //redirect
        return redirect()->route('users.show',$user->id);
    }

    public function destroy($id)
    {
        return view('users.delete');
        /*$user=User::find($id);
        $posts=Post::all();
        $comments=Comment::all();
        $members=Member::all();

        foreach($posts as $post){
            if($post->user_id==$id){
                $post->tags()->detach();
                $post->delete();
            }
        }

        foreach ($comments as $comment){
            if($comment->user_id==$id){
                $comment->delete();
            }
        }*/



    }
}
