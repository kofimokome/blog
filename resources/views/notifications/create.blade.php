<?php use Illuminate\Foundation\Auth\User;?>
@extends('layouts.master')
@section('title','Notification::New')
@if(Auth::user()->role=='admin')
<?php $users=User::all()?>
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Create Notification</h2><p>
        <span class="intro-heading">Notify someone about an event</span><br/>
    </p>
    </div>
    </p>
@stop
@section('left_side')
    <div class="container-fluid">
    {{Form::open(['route' => 'notifications.store'])}}

    {{form::label('user','Users: ')}}
    <select name="user" id=""  class="form-control">
        @foreach($users as $tag)
            @if($tag->id!=1)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endif
        @endforeach
    </select>

    {{form::label('message','Your Message: ')}}
    {{Form::textarea('message',null,['class'=>'form-control'])}}

        <button class="btn btn-block btn-primary">Notify</button>
    {{Form::close()}}
    </div>
@stop

@else

@section('introduction')
    <p>
        <div class="text-center">
            <h2>Oops</h2><p>
        <span class="intro-heading">Sorry You are not allowed to enter here</span><br/>
    </p>
@stop
@endif