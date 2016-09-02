@extends('layouts.general')

@section('title','Services')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
@stop

@section('introduction')
    <p>
        <div class="text-center">
            <h2>Services</h2><p>
        <span class="intro-heading">You will amazed with what we can do</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <div class="container-fluid">
        <div class="subject">Our Services</div>
        <div class="container-fluid">
            <p id="services"><span class="glyphicon glyphicon-chevron-right" id="services"></span>Web Page Development
            </p>
            <p id="services"><span class="glyphicon glyphicon-chevron-right" id="services"></span>Android Application
            </p>
            <p id="services"><span class="glyphicon glyphicon-chevron-right" id="services"></span>Web Page
                Administration</p>
            <p id="services"><span class="glyphicon glyphicon-chevron-right" id="services"></span>Database
                Administration</p>
            <p id="services"><span class="glyphicon glyphicon-chevron-right" id="services"></span>Boot Camp For Startups
            </p>
            <p id="services"><span class="glyphicon glyphicon-chevron-right" id="services"></span>Java Application
                Development</p>
        </div>
        <br>
        <div class="subject">Our Technology</div>
        <div class="container-fluid">
            <span class="fa fa-drupal fa-5x" data-toggle="tooltip" data-placement="top" title="Drupal" id="services-logo"></span>
            <span class="fa fa-wordpress fa-5x" id="services-logo" data-toggle="tooltip" data-placement="top" title="WordPress"></span>
            <span class="fa fa-5x fa-html5" id="services-logo" data-toggle="tooltip" data-placement="top" title="HTML"></span>
            <span class="fa fa-5x fa-joomla" id="services-logo" data-toggle="tooltip" data-placement="top" title="Joomla"></span>
            <br>
            <span class="fa fa-5x fa-btc" id="services-logo" data-toggle="tooltip" data-placement="top" title="BootStrap"></span>
            <span class="fa fa-5x fa-android" id="services-logo" data-toggle="tooltip" data-placement="top" title="Android"></span>
            <span class="fa fa-5x fa-jsfiddle" id="services-logo" data-toggle="tooltip" data-placement="top" title="Laravel"></span>
            <span class="fa fa-5x fa-apple" id="services-logo" data-toggle="tooltip" data-placement="top" title="Apple"></span>
        </div>
    </div>
@stop