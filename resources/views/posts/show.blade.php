@extends('layouts.master')
@section('title','Posts')

@section('introduction')
    <p>
        <div class="text-center">
            <h2>View Posts</h2><p>
        <span class="intro-heading">Lorem Ipsum Dolore</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
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
                @if(Auth::user())
                     @if(Auth::user()->id==$comment->user_id ||Auth::user()->role=='admin')
                        | <div style="display: inline-block"><a style="display: inline-block"
                                                              class="btn btn-sm btn-success"
                                                              href="{{route('comments.edit',$comment->id)}}">Edit</a> |
                            {!! Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'delete','style'=>"display: inline-block"]) !!}
                            <input name="post" type="hidden" value="{{$comment->post_id}}">
                            {!! Form::submit('Delete',['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                        @endif
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
                        <img src="{{asset('profiles/'.Auth::user()->picture)}}" alt="" style="width:40px;height:40px;display: inline-block;" class="img-responsive">
                    @else
                        <span class="fa-3x fa fa-user"></span>
                    @endif
                    <input name="user" type="hidden" value="{{Auth::user()->id}}">
                    <input name="post" type="hidden" value="{{$post->id}}">
                    <input name="author" type="hidden" value="{{$post->users->id}}">


                    <div class="input-group">

                        {{Form::text('comment',null,['class'=>'form-control','placeholder'=>'Comment'])}}
                    </div>
                </div>
                {{--     {{Form::submit('Comment',['class'=>'btn btn-default btn-sm fa fa-send'])}}--}}
                <button style="background-color: transparent; border:none;" class="btn btn-default btn-sm"><span
                            style="color:white;" class="fa-3x fa fa-send"></span></button>
                {{Form::close()}}

            </div>
        @endif
    </article>
@stop

@section('row1')
    <section>
        <div class="well" style="background-color:inherit; border:none;">
            <dl class="dl-horizontal">
                <label>Url</label>
                <p><a href="{{url('blog/'.$post->slug)}}">{{url('blog/'.$post->slug)}}</a></p>
            </dl>
            <dl class="dl-horizontal">
                <dt>Created at</dt>
                <dd>{{date( 'M j, Y h:i a',strtotime($post->created_at))}}</dd>
            </dl>
            @if(Auth::user())
                @if(Auth::user()->id==$post->users_id ||Auth::user()->role=='admin')
                    <dl class="dl-horizontal">
                        <dt>Updated</dt>
                        <dd>{{date( 'M j, Y h:i a',strtotime($post->updated_at))}}</dd>
                    </dl>
                @endif
            @endif
            <dl class="dl-horizontal">
                <dt>Category</dt>
                <dd><a href="{{route('categories.show',$post->category->id)}}">{{$post->category->name}}</a></dd>
            </dl>
            <dl class="dl-horizontal">
                <dt>Tags</dt>
                <dd>@foreach($post->tags as $tag)
                        <a href="{{route('tags.show',$tag->id)}}"><span class="label label-default">{{$tag->name}}</span></a>
                    @endforeach</dd>
            </dl>
            @if(Auth::user())
                @if(Auth::user()->id==$post->users_id ||Auth::user()->role=='admin')

                    <div class="row">
                        <div class="col-sm-6">

                            {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
                        </div>




                        <div class="col-sm-6">
                            {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'delete']) !!}

                            <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#{{$post->id}}">Delete</button>

                            <div  id="{{$post->id}}" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title">Confirm Delete</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>Do You Want To Delete {{$post->title}}?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @endif

            @endif

            <a style="margin-top:20px;" href="{{url('/blog')}}" class="btn btn-default btn-block"><< All Post</a>
        </div>
    </section>
@stop