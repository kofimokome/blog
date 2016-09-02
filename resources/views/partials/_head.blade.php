<!doctype html>
<?php use kofi\Contact;
$con = Contact::all();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/style.css')}}"/>
    <link rel="stylesheet" href="{{asset('awesome/css/font-awesome.css')}}"/>
    <script src="{{asset('js/jquery-3.1.0.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    @yield('styles')
    <style>
        /* *{border:solid red 1px; }*/
    </style>
</head>
<body>