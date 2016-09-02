<?php

namespace kofi\Http\Controllers;

use Illuminate\Http\Request;
use kofi\Comment;
use kofi\Http\Requests;
use kofi\Notification;
use Purifier;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware($this->authMiddleware());
    }

    public function store(Request $request)
    {
        //Validation here
        $this->validate($request, array(
            'comment' => 'required|min:1'
        ));
        //Storing the comments
        $post = $request->post;

        $com = new Comment;
        $com->name = Purifier::clean($request->comment);
        $com->user_id = $request->user;
        $com->post_id = $request->post;
        $com->save();

        //Make a notification
        if ($request->user != $request->author) {
            $not = new Notification;
            $not->message = 'added a comment on your post';
            $not->user_id = $request->author;
            $not->post_id = $request->post;
            $not->from = $request->user;
            $not->save();
        }

        //generating notification
        session()->put('msg', 'Comment Created');

        //redirecting
        return redirect()->route('posts.show', $post);

    }

    public function edit($id)
    {
        //find the comment
        $com = Comment::find($id);
        return view('comments.edit')->withCom($com);
    }

    public function update(Request $request, $id)
    {
        //Validate data
        $this->validate($request, array(
            'name' => 'required|min:1'
        ));
        //get the comment by its id
        $com = Comment::find($id);
        $com->name = Purifier::clean($request->name);
        $com->save();
        $post = $request->posth;

        //creating alert
        session()->put('msg', 'Comment Updated');

        //redirecting
        return redirect()->route('posts.show', $post);

    }

    public function destroy(Request $request, $id)
    {
        //get the comment by its id
        $com = Comment::find($id);
        $com->delete();
        //get the post id
        $post = $request->post;

        //create notification
        session()->put('msg', 'Comment Deleted ');
        return redirect()->route('posts.show', $post);

    }
}
