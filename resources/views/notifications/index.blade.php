<?php use kofi\User;?>
@extends('layouts.master')
@section('title',' Notifications')

@section('introduction')
    <p xmlns="http://www.w3.org/1999/html">
        <div class="text-center">
            <h2>Your Notifications </h2><p>
        <span class="intro-heading">You will always be notified about events, {{Auth::user()->name}}</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <div class="container-fluid">
    <?php $user = Auth::user();?>
    <table class="table table-striped lead">
        <thead>
        <th>NOTIFICATION</th>
        <th></th>
        <th>ACTION</th>
        </thead>
        <tbody>
        @foreach($not as $not)
                @if($not->user_id==Auth::user()->id)
                    @if($not->from!=Auth::user()->id)
                <?php $from=$not->from?>
                <?php
                $row=User::find($from);
                ?>
            <tr>
                <td>
                    {{$row->name}} : {!!$not->message!!}
                </td>
                <td>
                    @if($not->post_id != null)
                         <a class="lead" href="{{route('posts.show',$not->post_id)}}">View</a> <span class="glyphicon glyphicon-send"></span>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route'=>['notifications.destroy',$not->id],'method'=>'delete']) !!}
                    <button style="background-color: transparent; border:none;">Delete <span class="text-danger glyphicon glyphicon-remove"></span></button>
                    {!! Form::close() !!}
                </td>
            </tr>
                @endif
            @endif

        @endforeach

        </tbody>
    </table>

    </div>
@stop
@if(Auth::user()->role=='admin')
@section('row1')
    <section>
        <div class="container-fluid">
            <a href="{{route('notifications.create')}}" class="btn btn-lg btn-primary">New Notification</a>
        </div>
    </section>
@stop
@endif