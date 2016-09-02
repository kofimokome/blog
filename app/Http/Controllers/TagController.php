<?php

namespace kofi\Http\Controllers;

use Illuminate\Http\Request;

use kofi\Http\Requests;
use kofi\Tag;
use kofi\Post;

class TagController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag=Tag::all();
        return view('tags.index')->withTag($tag);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,array(
            'name'=>'required|max:255'
        ) );
        $tag=new Tag;
        $tag->name=$request->name;
        $tag->save();
        session()->put('msg','Tag Created');
        //redirect to index
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag=Tag::find($id);
        $posts = Post::all();
        return view('tags.show')->withTag($tag)->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=Tag::find($id);
        return view('tags.edit')->withTag($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,array(
            'name'=>'required|max:255'
        ) );

        $tag=Tag::find($id);

        $tag->name=$request->input('name');
        $tag->save();
        session()->put('msg','Tag Updated');
        //redirect to index
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tags=Tag::find($id);
        $tags->posts()->detach();
        $tags->delete();

        session()->put('msg','Tag Deleted');
        //you can redirect
        return redirect()->route('tags.index');
    }
}
