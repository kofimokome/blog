@extends('layouts.master')
@section('title','Category : Show')
@section('introduction')
    <p>
        <div class="text-center">
            <h2>View A Category</h2><p>
        <span class="intro-heading">See all the blogs under {{$cat->name}}</span><br/>
    </p>
    </div>
    </p>
@stop

@section('left_side')
    <div class="container-fluid">
        @foreach($posts as $post)
            <p>{{$post->title}}</p>
            <article style="margin-bottom: 20px;" class="container-fluid">
                <div class="subject">{{$post->title}}</div>
                <p class="post-time ">
                <blockquote>
                    {{date( 'M j, Y',strtotime($post->created_at))}} by <span
                            class="text-capitalize">{{$post->users->name}}</span>

                </blockquote>
                </p>

                {!! strip_tags($post->body)!!}
                <p>
                <dl class="dl-horizontal">
                    <label>Category: </label>
                    <label>
                        {{$post->category->name}}
                    </label>
                </dl>
                <dl class="dl-horizontal">
                    <label>Tags: </label>
                    <label>
                        @foreach($post->tags as $tag)
                            <a href="{{route('tags.show',$tag->id)}}"><span class="label label-default">{{$tag->name}}</span></a>
                        @endforeach
                    </label>
                </dl>
                <p><span class="fa fa-comments fa-2x"></span><span class="badge">{{$post->comments->count()}}</span></p>
                </p>
                <hr>
                <a href="{{Route('blog.single',$post->slug)}}" class="btn btn-primary">READ MORE</a>
                <a href="{{Route('blog.single',$post->slug)}}" class="btn btn-default">COMMENTS</a>
            </article>

        @endforeach
            <div class="text-center">{!! $posts->links() !!}</div>


    </div>
@stop

