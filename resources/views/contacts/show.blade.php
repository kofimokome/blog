@extends('layouts.master')
@section('title',' Notifications')
@if(Auth::user())
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
    <form class="form-horizontal">
        <div class="form-group">
            <label class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{$con->name}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Number</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{$con->number}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{$con->email}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Subject</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{$con->subject}}</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Message</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{$con->message}}</p>
            </div>
        </div>

    </form>
@stop

@section('row1')
    <section>
        <div class="well" style="background-color:inherit; border:none;">
            <dl class="dl-horizontal">
                <dt>Created at</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime($con->created_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Updated</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime($con->updated_at))}}</dd>
            </dl>


            <div class="row">
                <div class="col-sm-6">
                    {!! Html::linkRoute('contacts.index','Back',array($con->id),array('class'=>'btn btn-primary btn-block')) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::open(['route'=>['contacts.destroy',$con->id],'method'=>'delete']) !!}
                    {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
                    {!! Form::close() !!}
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
