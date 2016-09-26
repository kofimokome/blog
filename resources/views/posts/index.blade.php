@extends('layouts.master')
@section('title','All Posts')
@if(Auth::user()->role=='admin')
@section('introduction')
<p>
    <div class="text-center">
        <h2>Manage Posts</h2><p>
    <span class="intro-heading">See what people have been posting</span><br/>
</p>
</div>
</p>
@stop
@section('left_side')
    <section>
        <div class="container-fluid">
    <div class="">
        <div class="row">
            <div class="col-md-4">
            <h1>all posts</h1>
                </div>
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
                <a href="{{route('posts.create')}}" class="btn btn-lg btn-primary">create new
                    post</a>
            </div>
        </div>
        <div class="">
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="">
            <table class="table">
                <thead>
                <th>#</th>
                <th>Title</th>
                <th>Body</th>
                <th>Created at</th>
                <th>Blank</th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <th>{{$post->id}}</th>
                        <td>{{$post->title}}</td>
                        <td>{{substr(strip_tags($post->body),0,20)}} {{strlen(strip_tags($post->body))>20?"...":""}}</td>
                        <td>{{date('M j,Y',strtotime($post->created_at))}}</td>
                        <td>
                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-sm">View</a>
                            <a href="{{route('posts.edit',$post->id)}}" class="btn btn-default btn-sm">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center">
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>
        </div>
    </section>
@stop
@else
@section('introduction')
    <p>
        <div class="text-center">
            <h2>Oops</h2><p>
        <span class="intro-heading">Sorry You are not allowed to enter here</span></p><br/>
      </div>
    </p>
@stop
@endif
