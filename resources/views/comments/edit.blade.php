@extends('layouts.master')
@section('title',' Edit')
@section('left_side')
    <section>
        <div class="container-fluid">
            {!! Form::model($com,['route'=>['comments.update',$com->id],'method'=>'put']) !!}
            <div class="">
                {{Form::label('name','Comment: ')}}
                {{Form::text('name',null,['class'=>'form-control input-lg'])}}

                <input type="hidden" name="posth" value="{{$com->post_id}}">

            </div>

        </div>
    </section>
@stop

@section('introduction')
    <p>
        <div class="text-center">
            <h2>Edit Comment</h2><p>
        <span class="intro-heading">Lorem Ipsum Dolore</span><br/>
    </p>
    </div>
    </p>
@stop

@section('row1')
    <section>
        <div class="well" style="background-color:inherit; border:none;">
            <dl class="dl-horizontal">
                <dt>Created at</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime($com->created_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Updated</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime($com->updated_at))}}
                </dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {{Form::submit('Save',array('class'=>'btn btn-success btn-block'))}}

                </div>
                <div class="col-sm-6">
                    <a href="{{route('posts.show',$com->post_id)}}" class="btn btn-danger btn-block">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop