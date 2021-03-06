@extends('layouts.master')
@section('title',' Edit')
@if(Auth::user())
@if(Auth::user()->role=='admin')
@section('left_side')
    <section>
        <div class="container-fluid">
            {!! Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'put']) !!}
            <div class="">
                {{Form::label('name','Name: ')}}
                {{Form::text('name',null,['class'=>'form-control input-lg'])}}

            </div>

        </div>
    </section>
@stop

@section('introduction')
    <p>
        <div class="text-center">
            <h2>Edit Tags</h2><p>
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
                <dd>{{date( 'M j, Y h:i a',strtotime($tag->created_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Updated</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime($tag->updated_at))}}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {{Form::submit('Save',array('class'=>'btn btn-success btn-block'))}}

                </div>
                <div class="col-sm-6">
                    <a href="{{route('tags.index')}}" class="btn btn-danger btn-block">Cancel</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop
@else
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Oops</h2><p>
        <span class="intro-heading">Sorry You are not allowed to enter here</span></p><br/>
      </div>
    </p>
@stop
@endif
@else
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Oops</h2><p>
        <span class="intro-heading">Please Login first</span></p><br/>
      </div>
    </p>
@stop
@endif
