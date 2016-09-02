<?php use kofi\User;?>
@extends('layouts.master')
@section('title',' Messages')

@section('introduction')
    <p xmlns="http://www.w3.org/1999/html">
        <div class="text-center">
            <h2>Your Messages </h2><p>
        <span class="intro-heading">Hello !! {{Auth::user()->name}}, this function is still under development.</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <div class="container-fluid">
        <?php $user = Auth::user();?>
        <table class="table table-striped lead">
            <thead>
            <th>USER</th>
            <th></th>
            <th>ACTION</th>
            </thead>
            <tbody>

            @foreach($me as $not)
                    <?php $from=$not->from?>
                    <?php
                    $row=User::find($from);
                    ?>
                    @if($not->from==Auth::user()->id)
                    <tr>
                        <td>
                            {{$row->name}} : {!!$not->message!!}
                        </td>
                        <td>
                            @if($not->post_id != null)
                                <a class="lead" href="{{route('messages.show',$not->post_id)}}">View</a> <span class="glyphicon glyphicon-send"></span>
                            @endif
                        </td>
                        <td>
                            {!! Form::open(['route'=>['messages.destroy',$not->id],'method'=>'delete']) !!}
                            <button style="background-color: transparent; border:none;">Delete <span class="text-danger glyphicon glyphicon-remove"></span></button>
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
            <a href="{{route('messages.create')}}" class="btn btn-lg btn-primary">New Message</a>
        </div>
    </section>
@stop