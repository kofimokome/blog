<!doctype html>
<?php use kofi\Contact;
$con = Contact::all();
?>
@if(Auth::user())
    @if(Session::has('not'))
    @else
        {{session()->put('not','1')}}
    @endif
@else
    {{session()->forget('not')}}
@endif

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DEIFORM | @yield('title')</title>
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
<?php $c_user = Auth::user();?>
<div class="container"><br/> <br/></div>
<div class="container">
    <div class="container">
        <nav class="navbar navbar-inverse navs" style="font-size: 20px;">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header" style="padding:3px;">
                    <a class="navbar-brand" href="#" style="font-size: 02em; font-weight: bold;">DEIFORM</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div style="height:2cm;" class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="{{Request::is('/')? 'active':''}}"><a href="/" style="padding:22px;">Home <span
                                        class="sr-only">(current)</span></a></li>
                        <li class="{{Request::is('blog')? 'active':''}}"><a href="/blog" style="padding:22px;">Blog</a>
                        </li>
                        <li class="{{Request::is('services')? 'active':''}}"><a href="/services"
                                                                                style="padding:22px;">Services</a></li>
                        <li class="{{Request::is('products')? 'active':''}}"><a href="/products"
                                                                                style="padding:22px;">Products</a></li>
                        <li class="{{Request::is('contact')? 'active':''}}"><a href="/contact"
                                                                               style="padding:22px;">Contact</a></li>
                        @if(Auth::user())
                            <li class="dropdown">
                                <a style="padding:22px;" href="#" class="dropdown-toggle" data-toggle="dropdown"
                                   role="button"
                                   aria-haspopup="true" aria-expanded="false">
                                    {{Auth::user()->name}}
                                    @if($c_user->notifications->count()!=0)
                                        <span class="badge">{{$c_user->notifications->count()}}</span>
                                    @endif
                                    <span class="caret"></span>

                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('users.show',Auth::user()->id)}}">Profile</a></li>
                                    <li><a href="{{route('messages.index')}}">Messages (beta)</a></li>
                                    <li>
                                        <a href="{{url('/notifications')}}">
                                            Notifications
                                            @if($c_user->notifications->count()!=0)
                                                <span class="badge">{{$c_user->notifications->count()}}</span>
                                            @endif
                                        </a>
                                    </li>
                                    @if(Auth::user()->role=='admin')
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{url('/posts')}}">Posts</a></li>
                                        <li><a href="{{url('/tags')}}">Tags</a></li>
                                        <li><a href="{{url('/contacts')}}">Contact Form <span
                                                        class="badge">{{$con->count()}}</span></a></li>
                                        <li><a href="{{url('/categories')}}">Categories</a></li>
                                        <li><a href="{{url('/users')}}">Users</a></li>
                                    @endif
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{url('/logout')}}">Logout</a></li>
                                </ul>
                            </li>
                        @else
                            <li><a href="{{url('/login')}}" style="padding:22px;">Login</a></li>
                        @endif
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="container">
            @yield('introduction')

        </div>
    </div>
</div>
<br/><br/> <br/>
<div class="container">
    <div class="col-md-8">
        @if(Session::has('msg'))
            <div id="notifications">
                <div class="lead text-center alert alert-success ">{{Session('msg')}}</div>
            </div>
            {{session()->forget('msg')}}
        @endif

        @if(Session('not')==1)
            @if($c_user->notifications->count()!=0)
                <div class="lead text-center alert alert-info ">Hello <span class="text-capitalize">{{Auth::user()->name}}</span> You
                    have {{$c_user->notifications->count()}} notification(s).
                    <a href="{{url('notifications')}}">Click here to see them</a></div>
                {{session()->put('not','0')}}
            @endif
        @endif


        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ol>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ol>
            </div>
        @endif

        <section style="padding-bottom:5px;">
            @yield('left_side')
        </section>
    </div>

    <div class="col-md-4 ">
        <div class="row">

            @yield('row1')

        </div>
        <div class="row" style="margin-top:10px;">

            @yield('row2')

        </div>
        <div class="row" style="margin-top:10px;">

            @yield('row3')

        </div>
    </div>
</div>

<footer class="container-fluid">
    <div class="container">
        <div class="col-md-3">
            <span style="font-weight: bold; font-size:20px;">LOREM IPSUM</span>
            <p>
                <a href=""><u>Nam cursis nisi nec vivera iaculis</u></a>
            </p>
            <p>
                <a href=""><u>Interger lacina risus id nibh vestibulum</u></a>
            </p>
            <p>
                <a href=""><u>Mauris eget ante ut elit rutrum ornare</u></a>
            </p>
            <p>
                <a href=""><u>Vivanus quis orci et suscrit consequa</u></a>
            </p>
            <p>
                <a href=""><u>Nam eget tellus adiposcin hendfreit</u></a>
            </p>
        </div>
        <div class="col-md-3">
            <span style="font-weight: bold; font-size:20px;">LOREM IPSUM</span>
            <p>
                <a href=""><u>Nam cursis nisi nec vivera iaculis</u></a>
            </p>
            <p>
                <a href=""><u>Interger lacina risus id nibh vestibulum</u></a>
            </p>
            <p>
                <a href=""><u>Mauris eget ante ut elit rutrum ornare</u></a>
            </p>
            <p>
                <a href=""><u>Vivanus quis orci et suscrit consequa</u></a>
            </p>
            <p>
                <a href=""><u>Nam eget tellus adiposcin hendfreit</u></a>
            </p>
        </div>
        <div class="col-md-3">
            <span style="font-weight: bold; font-size:20px;">LOREM IPSUM</span>
            <p>
                <a href=""><u>Nam cursis nisi nec vivera iaculis</u></a>
            </p>
            <p>
                <a href=""><u>Interger lacina risus id nibh vestibulum</u></a>
            </p>
            <p>
                <a href=""><u>Mauris eget ante ut elit rutrum ornare</u></a>
            </p>
            <p>
                <a href=""><u>Vivanus quis orci et suscrit consequa</u></a>
            </p>
            <p>
                <a href=""><u>Nam eget tellus adiposcin hendfreit</u></a>
            </p>
        </div>
        <div class="col-md-3"><span style="font-weight: bold; font-size:20px;">Lorem ipsum dolor </span>
            <p>
                sit amet, consectetur adipisicing elit. Aliquid aperiam asperiores aspernatur, debitis excepturi facilis
                incidunt itaque minima numquam rerum sapiente sequi vitae voluptatibus! Ab cupiditate deserunt in
                nesciunt voluptas.
            </p>
            <span class="fa fa-facebook-f fa-3x logo" style="margin-right:20px;"></span><span style="margin-right:20px;"
                                                                                              class="logo fa fa-twitter fa-3x"></span><span
                    style="margin-right:20px;" class="logo fa fa-youtube fa-3x"></span><span
                    class="logo fa fa-instagram fa-3x"></span>
        </div>
    </div>
</footer>
</body>
<script>
    var notification = document.getElementById('notifications');
    setTimeout("notification.style.display='none';", 5000);
</script>
@yield('scripts')
</html>