@extends('layouts.master')
@section('title','Tag')
@if(Auth::user())
@if(Auth::user()->role=='admin')
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Manage Tags</h2><p>
        <span class="intro-heading">Tags are important in todays blog</span><br/>
    </p>
    </div>
    </p>
@stop
@section('left_side')
    <section>
    <div class="container-fluid">
        <div class="col-md-8">
            <h1>Tags</h1>
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tag as $tag)
                    <tr>
                        <th>{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>
                            <a href="{{route('tags.edit',$tag->id)}}" style="display: inline-block;" class="btn btn-default btn-sm">Edit</a>
                            {!! Form::open(['route'=>['tags.destroy',$tag->id],'method'=>'delete','style'=>'display: inline-block']) !!}
                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>

    </div>
    </section>
@stop
@section('row1')
    <section>
    <div class="container-fluid">
        <div class="well" style="background-color: inherit; border:none;">
            {{Form::open(['route'=>'tags.store'])}}
            <h2>Create tag</h2>
            {{Form::label('name','Tag Name: ')}}
            {{form::text('name',null,['class'=>'form-control'])}}
            <br>
            {{Form::submit("create",['class'=>'btn btn-success btn-block'])}}
            {{form::close()}}
        </div>
    </div>
    </section>
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
@else
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Oops</h2><p>
        <span class="intro-heading">Please Login first</span><br/>
    </p>
@stop
@endif