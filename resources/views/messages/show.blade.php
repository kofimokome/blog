<?php use kofi\User; use kofi\Member;?>
@extends('layouts.master')
@section('title',' Messages')

@section('introduction')
    <p xmlns="http://www.w3.org/1999/html">
        <div class="text-center">
            <h2>Your Messages </h2><p>
        <span class="intro-heading">Hello !! {{Auth::user()->name}}
            , this function is still under development.</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <div class="container-fluid">
        <div class="subject"> {{$chan->name}}</div>
        <p> @foreach($messages as $message)
            @if($chan->id==$message->channel_id)
                <?php $id = $message->user_id; $user = User::find($id);?>
                    <br>{{$user->name}} : {{$message->message}}<br>

                @endif
                @endforeach
            <?php $members=Member::all(); ?>
            @foreach($members as $member)
                @if($chan->id==$member->channel_id)
                    @if($member->user_id!=Auth::user()->id)
                        <?php $paticipant=$user->id?>
                    @endif
                @endif
                @endforeach
                </p>
                <p>
                    {{Form::open(['route' => 'messages.store'])}}
                    {{--{{Form::label('message','')}}--}}
                    {{Auth::user()->name}}:
                    {{Form::text('message',null,['class'=>' input-lg','placeholder'=>'write a message'])}}
                    <input type="hidden" name="user" value="{{Auth::user()->id}}">
                    <input type="hidden" name="channel" value="{{$chan->id}}">
                    <input type="hidden" name="participant" value="{{$paticipant}}">
                    <input type="hidden" name="chat" value="{{$chan->name}}">
                    <button style="background-color: transparent; border:none;" class="btn btn-default btn-sm"><span
                                style="color:white;" class="fa-3x fa fa-send"></span></button>
                    {{Form::close()}}
                </p>
    </div>
@stop