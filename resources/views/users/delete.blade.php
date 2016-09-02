@extends('layouts.master')
@section('title','Delete')
@if(Auth::user()->role=='admin')
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Oops</h2><p>
        <span class="intro-heading">Sorry Deleting an account will be available soon</span><br/>
    </p>
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