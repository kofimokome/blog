@extends('layouts.master')
@section('title','Tag : Show')
@section('introduction')
    <p>
        <div class="text-center">
            <h2>View A Tag</h2><p>
        <span class="intro-heading">See all the blogs under {{$tag->name}}</span><br/>
        <br>

       {{-- @foreach($posts as $tags)
             <span class="label label-default">{{$tags->name}}</span>
        @endforeach--}}
    </p>
    </div>
    </p>
@stop
@section('left_side')
@stop
