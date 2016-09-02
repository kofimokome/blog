@extends('layouts.master')

@section('title',' Profile')



@section('introduction')
    @if(Auth::user()->role=='admin' && isset($admin))
        <p>
            <div class="text-center">
                <h2>Welcome To Your Profile </h2><p>
            <span class="intro-heading">Lets have a look at {{$admin->name}}'s profile, </span><br/>
        </p>
        </div>
        </p>
    @else
        <p>
            <div class="text-center">
                <h2>Welcome To Your Profile </h2><p>
            <span class="intro-heading">Lets have a look at your profile, {{Auth::user()->name}}</span><br/>
        </p>
        </div>
        </p>
    @endif
@stop


@section('left_side')
    <?php $user = Auth::user()?>
    <section>
        <div class="container-fluid">
            <div style="display: inline-block;vertical-align: top; margin-right: 20px;" class="">

                @if(Auth::user()->role=='admin' && isset($admin))


                    @if($admin->picture != null)
                        <div><img src="{{asset('profiles/'.$admin->picture)}}" alt=""
                                  style="width:240px;height:240px;" class="img-responsive"></div>
                    @else
                        <div><span style="width:240px;height:240px;" class="fa-5x fa fa-user"></span></div>
                    @endif
            </div>

            <div style="display: inline-block;width:60%;" class="">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$admin->name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{$admin->email}}</p>
                        </div>
                    </div>



                @else{{--//for user()->role--}}



                @if(Auth::user()->picture != null)
                    <div><img src="{{asset('profiles/'.Auth::user()->picture)}}" alt=""
                              style="width:240px;height:240px;" class="img-responsive"></div>
                @else
                    <div><span style="width:240px;height:240px;" class="fa-5x fa fa-user"></span></div>
                @endif
            </div>

            <div style="display: inline-block;width:60%;" class="">
                <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{Auth::user()->name}}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">{{Auth::user()->email}}</p>
                        </div>
                    </div>


                    @endif {{--//for user()->role--}}


                    <div class="form-group">
                        <label class="col-sm-2 control-label">BirthDay: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">Unavailable</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">Unavailable</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Address: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">Unavailable</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Role: </label>
                        <div class="col-sm-10">
                            <p class="form-control-static">Unavailable</p>
                        </div>
                    </div>
                </form>
            </div>

            @if(Auth::user()->role=='admin' && isset($admin))


                @foreach($admin->posts as $post)
                    <hr>
                    <article style="margin-bottom: 20px;" class="container-fluid">
                        <div class="subject">{{$post->title}}</div>
                        <p class="post-time">
                        <blockquote>Posted by {{$post->users->name}}</blockquote>
                        </p>
                        @if($post->image != null)
                            <div><img src="{{asset('images/'.$post->image)}}" alt="" class="img-responsive"></div>
                        @endif
                        {!!$post->body!!}
                        <hr>
                        <span class="fa fa-comments fa-3x"></span><span class="badge">{{$post->comments->count()}}</span>
                        <blockquote>
                            @foreach($post->comments as $comment)
                                <p>
                                <div style="display: inline-block">{{$comment->user->name}}:
                                    {{$comment->name}}
                                </div>
                                @if($admin->id==$comment->user_id ||Auth::user()->role=='admin')
                                    |
                                    <div style="display: inline-block"><a style="display: inline-block"
                                                                          class="btn btn-sm btn-success"
                                                                          href="{{route('comments.edit',$comment->id)}}">Edit</a>
                                        |
                                        {!! Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'delete','style'=>"display: inline-block"]) !!}
                                        <input name="post" type="hidden" value="{{$comment->post_id}}">
                                        {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                    @endif
                                    </p>
                                    @endforeach
                        </blockquote>


                        @if(Auth::user())
                            <hr>
                            <div>

                                {{Form::open(['route' => 'comments.store','class'=>'form-inline'])}}
                                <div class="form-group">
                                    @if(Auth::user()->picture != null)
                                        <img src="{{asset('profiles/'.Auth::user()->picture)}}" alt=""
                                             style="width:40px;height:40px;display: inline-block;" class="img-responsive">
                                    @else
                                        <span class="fa-3x fa fa-user"></span>
                                    @endif
                                    <input name="user" type="hidden" value="{{Auth::user()->id}}">
                                    <input name="post" type="hidden" value="{{$post->id}}">
                                    <input name="author" type="hidden" value="{{$post->users->id}}">


                                    <div class="input-group">

                                        {{Form::text('comment',null,['class'=>'form-control'])}}
                                    </div>
                                </div>
                                {{--     {{Form::submit('Comment',['class'=>'btn btn-default btn-sm fa fa-send'])}}--}}
                                <button style="background-color: transparent; border:none;"
                                        class="btn btn-default btn-sm"><span
                                            style="color:white;" class="fa-3x fa fa-send"></span></button>
                                {{Form::close()}}

                            </div>
                        @endif
                    </article>
                @endforeach



                @else {{--//for user()->role--}}



            @foreach($user->posts as $post)
                <hr>
                <article style="margin-bottom: 20px;" class="container-fluid">
                    <div class="subject">{{$post->title}}</div>
                    <p class="post-time">
                    <blockquote>Posted by {{$post->users->name}}</blockquote>
                    </p>
                    @if($post->image != null)
                        <div><img src="{{asset('images/'.$post->image)}}" alt="" class="img-responsive"></div>
                    @endif
                    {!!$post->body!!}
                    <hr>
                    <span class="fa fa-comments fa-3x"></span><span class="badge">{{$post->comments->count()}}</span>
                    <blockquote>
                        @foreach($post->comments as $comment)
                            <p>
                            <div style="display: inline-block">{{$comment->user->name}}:
                                {{$comment->name}}
                            </div>
                            @if(Auth::user()->id==$comment->user_id ||Auth::user()->role=='admin')
                                |
                                <div style="display: inline-block"><a style="display: inline-block"
                                                                      class="btn btn-sm btn-success"
                                                                      href="{{route('comments.edit',$comment->id)}}">Edit</a>
                                    |
                                    {!! Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'delete','style'=>"display: inline-block"]) !!}
                                    <input name="post" type="hidden" value="{{$comment->post_id}}">
                                    {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                                    {!! Form::close() !!}
                                </div>
                                @endif
                                </p>
                                @endforeach
                    </blockquote>


                    @if(Auth::user())
                        <hr>
                        <div>

                            {{Form::open(['route' => 'comments.store','class'=>'form-inline'])}}
                            <div class="form-group">
                                @if(Auth::user()->picture != null)
                                    <img src="{{asset('profiles/'.Auth::user()->picture)}}" alt=""
                                         style="width:40px;height:40px;display: inline-block;" class="img-responsive">
                                @else
                                    <span class="fa-3x fa fa-user"></span>
                                @endif
                                <input name="user" type="hidden" value="{{Auth::user()->id}}">
                                <input name="post" type="hidden" value="{{$post->id}}">
                                <input name="author" type="hidden" value="{{$post->users->id}}">


                                <div class="input-group">

                                    {{Form::text('comment',null,['class'=>'form-control'])}}
                                </div>
                            </div>
                            {{--     {{Form::submit('Comment',['class'=>'btn btn-default btn-sm fa fa-send'])}}--}}
                            <button style="background-color: transparent; border:none;"
                                    class="btn btn-default btn-sm"><span
                                        style="color:white;" class="fa-3x fa fa-send"></span></button>
                            {{Form::close()}}

                        </div>
                    @endif
                </article>
            @endforeach


                @endif {{--//for user()->role--}}


        </div>
    </section>
@stop

@section('row1')
    <section>
        <div class="well" style="background-color:inherit; border:none;">
            <dl class="dl-horizontal">
                <dt>Url</dt>
                <dd><a href="#">available soon</a></dd>
            </dl>
            @if(Auth::user()->role=='admin' && isset($admin))

                <dl class="dl-horizontal">
                    <dt>Created at</dt>
                    <dd>{{date( 'M j, Y h:i a',strtotime($admin->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Updated</dt>
                    <dd>{{date( 'M j, Y h:i a',strtotime($admin->updated_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Number of Posts</dt>
                    <dd>{{$admin->posts->count()}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Number of comments</dt>
                    <dd>{{$admin->comments->count()}}</dd>
                </dl>


                @else {{--for user()->role--}}


            <dl class="dl-horizontal">
                <dt>Created at</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime(Auth::user()->created_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Updated</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime(Auth::user()->updated_at))}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Number of Posts</dt>
                <dd>{{$user->posts->count()}}</dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Number of comments</dt>
                <dd>{{$user->comments->count()}}</dd>
            </dl>

        @endif{{--for user()->role--}}

            <hr>
            @if(Auth::user())

                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('users.edit','Edit',array(Auth::user()->id),array('class'=>'btn btn-primary btn-block')) !!}
                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['route'=>['users.destroy',Auth::user()->id],'method'=>'delete']) !!}
                        {!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            @endif
        </div>
    </section>
@stop