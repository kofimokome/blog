
@extends('layouts.master')
@section('title',' Notifications')
@if(Auth::user()->role=='admin')
@section('introduction')
    <p xmlns="http://www.w3.org/1999/html">
        <div class="text-center">
            <h2>Contact forms </h2><p>
        <span class="intro-heading">You will always be notified about events, {{Auth::user()->name}}</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <div class="container-fluid">
        <table class="table table-striped lead">
            <thead>
            <th>NAME : SUBJECT</th>
            <th></th>
            <th>ACTION</th>
            </thead>
            <tbody>

            @foreach($con as $con)
                    <tr>
                        <td>
                            {{$con->name}} : {!!$con->subject!!}
                        </td>
                        <td>
                                <a class="lead" href="{{route('contacts.show',$con->id)}}">View</a> <span class="glyphicon glyphicon-send"></span>
                        </td>
                        <td>
                            {!! Form::open(['route'=>['contacts.destroy',$con->id],'method'=>'delete']) !!}
                            <button style="background-color: transparent; border:none;">Delete <span class="text-danger glyphicon glyphicon-remove"></span></button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
              @endforeach

            </tbody>
        </table>
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