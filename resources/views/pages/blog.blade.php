@extends('layouts.master')
@section('title','Blog')
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Welcome To Our Blog</h2><p>
        <span class="intro-heading">Share | Comment | Fell Free</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    @foreach($posts as $post)
    <article style="margin-bottom: 20px;" class="container-fluid">
        <div class="subject">{{$post->title}}</div>
        <p class="post-time "><blockquote>
            {{date( 'M j, Y',strtotime($post->created_at))}} by <span class="text-capitalize">{{$post->users->name}}</span>

        </blockquote></p>

        {!! strip_tags($post->body)!!}
        <p>
        <dl class="dl-horizontal">
            <label>Category: </label>
            <label>
                <a href="{{route('categories.show',$post->category->id)}}">{{$post->category->name}}</a>
            </label>
        </dl>
        <dl class="dl-horizontal">
            <label>Tags: </label>
            <label>
                @foreach($post->tags as $tag)
                    <a href="{{route('tags.show',$tag->id)}}"> <span class="label label-default">{{$tag->name}}</span></a>
                @endforeach
            </label>
        </dl>
        <p><span class="fa fa-comments fa-2x"></span><span class="badge">{{$post->comments->count()}}</span></p>
        </p>
        <hr>
        <a href="{{Route('blog.single',$post->slug)}}" class="btn btn-primary">READ MORE</a>
        <a href="{{Route('blog.single',$post->slug)}}" class="btn btn-default">COMMENTS</a>
    </article>
    <hr>
    @endforeach

    <div class="text-center">{!! $posts->links() !!}</div>
@stop
@if(Auth::user())
@section('row1')
    <section>
        <div class="container-fluid">
        <a href="{{route('posts.create')}}" class="btn btn-lg btn-primary">create new
            post</a>
        </div>
    </section>
@stop
@endif