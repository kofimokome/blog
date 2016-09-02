@extends('layouts.master')
@section('styles')
    {!!Html::style('css/select2.css') !!}
    {!! Html::script('js/tinymce/tinymce.min.js') !!}

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: "link code autoresize",
            menubar: false
        });
    </script>
@stop
@section('title','| Create')
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Write a new post</h2><p>
        <span class="intro-heading">Make your voice to be ..</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <div class="container-fluid">
        <div class="">
            <h1>New Post</h1>
            <hr>
            {!! Form::open(array('route' => 'posts.store','files'=>true)) !!}
            {{form::label('title','Title:')}}
            {{form::text('title',null,array('class'=>'form-control'))}}


            <input name="user" type="hidden" value="{{Auth::user()->id}}">

            {{form::label('category_id','Category: ')}}
            <select name="category_id" id="" class="form-control">
                @foreach($cat as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>

            {{form::label('tags','Tags: ',['class'=>'form-spacing-top'])}}
            <select name="tags[]" id="" multiple="multiple" class="form-control select2-multi">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            {{Form::label('image','Upload',['class'=>'form-spacing-top'])}}
            {{Form::file('image')}}

            {{form::label('body','Post: ')}}
            {{form::textarea('body',null,array('class'=>'form-control'))}}
            {{form::label('Post',null,array('class'=>'invisible'))}}
            {{form::submit('Post',array('class'=>'form-control btn btn-success'))}}
            {!! Form::close() !!}
        </div>
    </div>
@stop
@section('scripts')
    {!! Html::script('js/select2.js') !!}
    <script>
        $('.select2-multi').select2();
    </script>
@stop