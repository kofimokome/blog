<?php use kofi\Channel; use kofi\User; $new=User::all();?>
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
        <?php $user = Auth::user(); ?>
        <table class="table table-striped lead">
            <thead>
            <th>Channel Name </th>
            <th></th>
            <th>ACTION</th>
            </thead>
            <tbody>

            @foreach($me as $not)
                <?php $na = $not->channel_id;
                $chan = Channel::find($na);
                ?>
                @if($not->user_id==Auth::user()->id)
                    <tr>
                        <td>
                            {{$chan->name}}
                        </td>
                        <td>
                            <a class="lead" href="{{route('messages.show',$chan->id)}}">View</a> <span
                                    class="glyphicon glyphicon-send"></span>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['messages.destroy',$not->id],'method'=>'delete']) !!}
                            <button style="background-color: transparent; border:none;">Delete <span
                                        class="text-danger glyphicon glyphicon-remove"></span></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@stop
@section('row1')
    <section>
        <div class="container-fluid">

            <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">New Message</button>

            <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Message</h4>
                        </div>
                        {{Form::open(['route' => 'messages.new'])}}

                        {{form::label('member','Select user: ')}}
                        <select name="member" id=""  class="form-control">
                            @foreach($new as $new_user)
                                @if($new_user->id!=1 && $new_user->id!=4 && $new_user->id!=Auth::user()->id)
                                    <option value="{{$new_user->id}}">{{$new_user->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        <input type="hidden" name="channel" value="{{Auth::user()->name}}">
                        <input type="hidden" name="creator" value="{{Auth::user()->id}}">
                        <input type="hidden">
                        {{form::label('message','Your Message: ')}}
                        {{Form::textarea('message',null,['class'=>'form-control'])}}

                        <button class="btn btn-block btn-primary">Send </button>
                        {{Form::close()}}
                    </div>
                </div>
            </div>

            {{--<a href="{{route('messages.create')}}" class="btn btn-lg btn-primary">New Message</a>--}}
        </div>
    </section>
@stop