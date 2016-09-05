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
    <?php $user = Auth::user();
        $new=User::all()?>
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
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#new">New Notification</button>

        <div  id="new" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">New Notification</h4>
                    </div>
                    <div class="modal-body">
                        {{Form::open(['route' => 'notifications.store'])}}

                        {{form::label('user','Select user: ')}}
                        <select name="user" id=""  class="form-control">
                            @foreach($new as $tag)
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@stop
@endif