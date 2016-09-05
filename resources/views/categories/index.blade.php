@extends('layouts.master')
@section('title','Category')
@if(Auth::user())
@if(Auth::user()->role=='admin')
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Manage Categories</h2><p>
        <span class="intro-heading">Categories are important in today's blog</span><br/>
    </p>
    </div>
    </p>
@stop
@section('left_side')
    <section>
        <div class="container-fluid">
            <div class="col-md-8">
                <h1>Categories</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cat as $cat)
                        <tr>
                            <th>{{$cat->id}}</th>
                            <td>{{$cat->name}}</td>
                            <td>
                                <a href="{{route('categories.edit',$cat->id)}}" style="display: inline-block;" class="btn btn-default btn-sm">Edit</a>
                                {!! Form::open(['route'=>['categories.destroy',$cat->id],'method'=>'delete','style'=>'display: inline-block']) !!}



                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$cat->id}}">Delete</button>

                                <div  id="{{$cat->id}}" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Confirm Delete</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Do You Want To Delete {{$cat->name}} Category?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                {{Form::open(['route'=>'categories.store'])}}
                <h2>New Category</h2>
                {{Form::label('name','Category Name: ')}}
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