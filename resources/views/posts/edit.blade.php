@extends('layouts.master')
@section('title',' Edit')
@if(Auth::user()->id==$post->users_id || Auth::user()->role=='admin')
@section('styles')
    {!!Html::style('css/select2.css') !!}
    {!! Html::script('js/tinymce/tinymce.min.js') !!}

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: "link code autoresize",
            menubar:false
        });
    </script>
@stop

@section('introduction')
    <p>
        <div class="text-center">
            <h2>Edit Posts</h2><p>
        <span class="intro-heading">Lorem Ipsum Dolore</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <section>
    <div class="container-fluid">
        {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'put','files'=>true]) !!}
        <div class="">
            {{Form::label('title','Title: ')}}
            {{Form::text('title',null,['class'=>'form-control input-lg'])}}

            {{Form::label('slug','Slug: ',['class'=>'form-spacing-top'])}}
            {{Form::text('slug',null,['class'=>'form-control '])}}

            {{form::label('tags','Tags: ',['class'=>'form-spacing-top'])}}
            <select name="tags[]" id="" multiple="multiple" class="form-control select2-multi">
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>

            {{Form::label('image','Upload',['class'=>'form-spacing-top'])}}
            {{Form::file('image')}}

            {{form::label('category_id','Category: ',['class'=>'form-spacing-top'])}}
            <select name="category_id" id="" class="form-control">
                @foreach($cat as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>

            {{Form::label('body','Body: ',['class'=>'form-spacing-top'])}}
            {{Form::textarea('body',null,['class'=>'form-control'])}}
        </div>
        <div class="col-md-4">

        </div>

    </div>
    </section>
@stop

@section('row1')
    <section>
    <div class="well" style="background-color:inherit; border:none;">
        <dl class="dl-horizontal">
            <dt>Created at</dt>
            <dd>{{date( 'M j, Y h:i a',strtotime($post->created_at))}}</dd>
        </dl>
        <dl class="dl-horizontal">
            <dt>Updated</dt>
            <dd>{{date( 'M j, Y h:i a',strtotime($post->updated_at))}}</dd>
        </dl>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                {{Form::submit('Save',array('class'=>'btn btn-success btn-block'))}}

            </div>
            <div class="col-sm-6">
                {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </section>
@stop
@section('scripts')
    {!! Html::script('js/select2.js') !!}
    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!!  json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
    </script>
@stop
@else
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Oops</h2>
            <p>
              <span class="intro-heading">Sorry You are not allowed to enter here</span>
              <br/>
            </p>
        </div>
    </p>
@stop
@endif
