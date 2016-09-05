<?php

namespace kofi\Http\Controllers;

use Illuminate\Http\Request;

use kofi\Http\Requests;
use kofi\Message;
use kofi\Channel;
use kofi\Member;
use kofi\User;
use Purifier;
use kofi\Notification;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware($this->authMiddleware());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $me=Member::all();
       // return 'Sorry Messaging has been temporarily shut down';
        return view('messages.index')->withMe($me);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation here
        $this->validate($request, array(
            'message' => 'required|min:1'
        ));
        //Storing the message

        $message = new Message;
        $message->message = Purifier::clean($request->message);
        $message->user_id = $request->user;
        $message->channel_id = $request->channel;
        $message->save();

        //Make a notification
            $not = new Notification;
            $not->message = 'sent you a message on '.$request->chat;
            $not->user_id = $request->participant;
            $not->from = $request->user;
            $not->save();

        //generating notification
        session()->put('msg', 'Message Sent');

        //redirecting
        return redirect()->route('messages.show', $request->channel);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chan=Channel::find($id);
        $messages=Message::all();
        return view('messages.show')->withChan($chan)->withMessages($messages);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    //my own added function
    public function newMessage(Request $request)
    {
        //Validation here
        $this->validate($request, array(
            'message' => 'required|min:1',
            'member'=>'required'
        ));
        
        //setting up a channel
        $channel=New Channel;
        $channel->name=$request->channel;
        $channel->save();
        
        //setting up participants

        //first member
        $member= new Member;
        $member->channel_id=$channel->id;
        $member->user_id=$request->creator;
        $member->save();

        //second member
        $member= new Member;
        $member->channel_id=$channel->id;
        $member->user_id=$request->member;
        $member->save();

        //Storing the message

        $message = new Message;
        $message->message = Purifier::clean($request->message);
        $message->user_id = $request->creator;
        $message->channel_id = $channel->id;
        $message->save();

        //Make a notification
        $not = new Notification;
        $not->message = 'sent you a message';
        $not->user_id = $request->member;
        $not->from = $request->creator;
        $not->save();

        //generating notification
        session()->put('msg', 'Message Sent');

        //setting up redirection
        $id=$channel->id;
        //redirecting
        return redirect()->route('messages.show',$id);
    }
}
