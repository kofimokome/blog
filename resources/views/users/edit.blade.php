@extends('layouts.master')

@section('title',' Profile : Edit')

@section('introduction')
    <p>
        <div class="text-center">
            <h2>Ooops </h2><p>
        <span class="intro-heading">Hello!! {{Auth::user()->name}}Your Profile will be available soon</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <section>
        <div class="container-fluid">
            {!! Form::model($user,['route'=>['users.update',$user->id],'method'=>'put','files'=>true]) !!}
            <div class="">
                {{Form::label('name','Name: ')}}
                {{Form::text('name',null,['class'=>'form-control input-lg'])}}


                {{form::label('email','Email: ',['class'=>'form-spacing-top'])}}
                {{Form::text('email',null,['class'=>'form-control input-lg'])}}

                {{Form::label('picture','Profile Picture',['class'=>'form-spacing-top'])}}
                {{Form::file('picture')}}
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
                <dd>{{date( 'M j, Y h:i a',strtotime($user->created_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Updated</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime($user->updated_at))}}</dd>
            </dl>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    {{Form::submit('Save',array('class'=>'btn btn-success btn-block'))}}

                </div>
                <div class="col-sm-6">
                    {!! Html::linkRoute('users.show','Cancel',array($user->id),array('class'=>'btn btn-danger btn-block')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop