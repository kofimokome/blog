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
                                    <li><a href="{{url('/contacts')}}">Contact Form <span class="badge">{{$con->count()}}</span></a></li>
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