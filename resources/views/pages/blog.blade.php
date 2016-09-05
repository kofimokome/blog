@extends('layouts.master')
@section('title','Blog')
@section('styles')
    {!!Html::style('css/select2.css') !!}
    {!! Html::script('js/tinymce/tinymce.min.js') !!}

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: "link code autoresize",
            menubar: false
        });
    </script>
@stop
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
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                Create New Post
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">New Post</h4>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(array('route' => 'posts.store','files'=>true)) !!}
                            {{form::label('title','Title:')}}
                            {{form::text('title',null,array('class'=>'form-control'))}}


                            <input name="user" type="hidden" value="{{Auth::user()->id}}">

                            {{form::label('category_id','Category: ')}}
                            <select name="category_id" id="" class="form-control">
                                @foreach($cat as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>

                            {{form::label('tags','Tags: ',['class'=>'form-spacing-top'])}}<br>
                            <select name="tags[]" id="" style="width:500px;" multiple="multiple" class="form-control select2-multi">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select><br>
                            {{Form::label('image','Upload',['class'=>'form-spacing-top'])}}
                            {{Form::file('image')}}

                            {{form::label('body','Post: ')}}
                            {{form::textarea('body',null,array('class'=>'form-control'))}}
                            {{form::label('Post',null,array('class'=>'invisible'))}}
                            {{form::submit('Post',array('class'=>'form-control btn btn-success'))}}
                            {!! Form::close() !!}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@stop
@section('scripts')
    {!! Html::script('js/select2.js') !!}
    <script>
        $('.select2-multi').select2();
    </script>
@stop
@endif