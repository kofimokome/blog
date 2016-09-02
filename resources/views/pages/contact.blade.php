@extends('layouts.general')

@section('title','Contact')
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Contact Us</h2><p>
        <span class="intro-heading">Have a problem? write to us and we'll see what to do</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <div style="padding:40px;">
        {!! Form::open(array('route' => 'contacts.store','class'=>"form-horizontal")) !!}
        <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3 text-left" for="name">Name</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-pencil"></span>
                    <input name="name" type="text" placeholder="Name" class="form-control input-lg" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                </div>
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <span id="inputSuccess3Status" class="sr-only">(success)</span>
            </div>
        </div>
        <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="email">Email</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon">@</span>
                    <input name="email" placeholder="Email" type="email" class="form-control input-lg" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                </div>
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <span id="inputGroupSuccess2Status" class="sr-only">(success)</span>
            </div>
        </div>
        <div class="form-group has-success has-feedback">
            <label class="control-label col-sm-3" for="phone">Phone</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-phone"></span>
                    <input name="phone" placeholder="phone" type="number" class="form-control input-lg" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                </div>
                <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                <span id="inputGroupSuccess2Status" class="sr-only">(success)</span>
            </div>
        </div>
        <div class="form-group ">
            <label class="control-label col-sm-3" for="subject">Subject</label>
            <div class="col-sm-9">
                <div class="input-group">
                    <span class="input-group-addon glyphicon glyphicon-pencil"></span>
                    <input name="subject" placeholder="subject" type="text" class="form-control input-lg" id="inputGroupSuccess2" aria-describedby="inputGroupSuccess2Status">
                </div>
                <span id="inputGroupSuccess2Status" class="sr-only">(success)</span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3" for="message">Message</label>
            <div class="col-sm-9">
                <textarea name="message" placeholder="Message" class="form-control" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-3 invisible">Message</label>
            <div class="col-sm-9">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}

        <address>
            <strong>Company Name, Inc.</strong><br>
            Location, street<br>
            City<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
        </address>

        <address>
            <strong>Full Name</strong><br>
            <a href="mailto:#">first.last@example.com</a>
        </address>
    </div>
@stop