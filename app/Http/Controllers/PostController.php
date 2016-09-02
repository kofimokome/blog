<?php

namespace kofi\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use kofi\Category;
use kofi\Comment;
use kofi\Http\Requests;
use kofi\Notification;
use kofi\Post;
use kofi\Tag;
use Purifier;

//use kofi\User;

//use blog\Category;
//use Session;
//use Symfony\Component\HttpFoundation\Session\Session;
//use Illuminate\Support\Facades\Session;
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware($this->authMiddleware());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //blog post storage
        //--at firstp--> $posts=Post::all();
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        //return view
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCat($cat)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);--used to debug


        //Data validation
        $this->validate($request, array(
            'title' => 'required|max:255',
            // 'slug'=>'required|min:5|max:255|alpha_dash|unique:posts,slug',
            'body' => 'required',
            'category_id' => 'required|integer',
            'image' => 'sometimes|image',
            'tags'=>'required'

        ));

        // Creation of slug for each post;
        $post = new Post([
            'title' => 'how',
        ]);

        //Storing other values
        $post->title = $request->title;
        // $post->slug=$request->slug;
        $post->body = Purifier::clean($request->body);
        $post->category_id = $request->category_id;
        $post->users_id = $request->user;
        $post->user_id=$request->user;

        //adding a slug


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();//you can use user->id for profile pics
            $location = public_path('images/' . $filename);

            Image::make($image)->save($location);//you can add->resize(800,400)
            $post->image = $filename;
        }


        //Data storage
        $post->save();

        $post->tags()->sync($request->tags, false);

        $not = new Notification;
        $not->user_id = 1;
        $not->post_id = $post->id;
        $not->message = 'added a new post';
        $not->from = $request->user;
        $not->save();
       /* $user = User::all();
        foreach ($user as $user) {
            if ($request->user != $user->id) {
                $not->user_id = $user->id;
                $not->post_id = $post->id;
                $not->message = 'added a new post';
                $not->from = $request->user;
                $not->save();
            }
        }
       -- alerts all users*/

        session()->put('msg', 'Post Created');
        // Session::flash('success','Post successful');
        //Page redirection
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        $com = Comment::all();
        return view('posts.show')->withPost($post)->withCom($com);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post
        $cat = Category::all();
        $post = Post::find($id);
        $tags = Tag::all();

        //return view
        return view('posts.edit')->withPost($post)->withCat($cat)->withTags($tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //data validation
        $post = Post::find($id);
        /* if($request->input('slug')==$post->slug){
             $this->validate($request,array(
                 'title'=>'required|max:255',
                 'body'=>'required'
             ) );
         }
         else{ --we did this because we added $id below*/
        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => "required|min:5|max:255|alpha_dash|unique:posts,slug,$id",
            'body' => 'required',
            'category_id' => 'required|integer',
            'image' => 'image'
        ));
        //} --for the else
        //save data
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = Purifier::clean($request->input('body'));
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        //added a photo
        if ($request->hasfile('image')) {
            //new photo
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();//you can use user->id for profile pics
            $location = public_path('images/' . $filename);

            Image::make($image)->save($location);// you can add ->resize(800,400)
            $old = $post->image;

            //update
            $post->image = $filename;
            //delete old photo
            Storage::delete($old);
        }
        //set success notification
        $post->save();
        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync([]);
        }
        session()->put('msg', 'Post Updated');
        //redirect
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        session()->put('msg', 'Post Deleted');
        return redirect()->route('blog');
    }
}
