@extends('layouts.master')
@section('title',' Edit')
@if(Auth::user()->role=='admin')
@section('left_side')
    <div class="container-fluid">
        <table class="table table-striped lead">
            <thead>
            <th>USER</th>
            <th>JOINED</th>
            <th>ACTION</th>
            </thead>
            <tbody>

            @foreach($user as $not)
                @if($not->id==1 || $not->id==4)
                @else
                    <tr>
                        <td>
                            <a href="{{url('viewuser/'.$not->id)}}"> {{$not->name}}</a>
                        </td>
                        <td>
                            {{date( 'M j, Y h:i a',strtotime($not->created_at))}}
                        </td>
                        <td>
                            {!! Form::open(['route'=>['users.destroy',$not->id],'method'=>'delete']) !!}
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
@else
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Oops</h2><p>
        <span class="intro-heading">Sorry You are not allowed to enter here</span><br/>
    </p>
@stop
@endif