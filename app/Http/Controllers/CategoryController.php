<?php

namespace kofi\Http\Controllers;

use Illuminate\Http\Request;
use kofi\Category;
use kofi\Http\Requests;
use kofi\Post;

class CategoryController extends Controller
{
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show all categories including a form
        $cat=Category::all();
        return view('categories.index')->withCat($cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //saves new category
        $this->validate($request,array(
            'name'=>'required|max:255'
        ) );
        $cat=new Category;
        $cat->name=$request->name;
        $cat->save();
        session()->put('msg','Category Created');
        //redirect to index
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Category::find($id);
        $posts = Post::orderBy('id', 'desc')->where('category_id', $id)->paginate(8);
        return view('categories.show')->withCat($cat)->withPosts($posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat=Category::find($id);
        return view('categories.edit')->withCat($cat);
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
        $cat=Category::find($id);
        $cat->name=$request->name;
        $cat->save();
        session()->put('msg','Category Updated');
        //redirect to index
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat=Category::find($id);
        $cat->delete();
        $posts=Post::all();
        foreach($posts as $post){
            if($post->category_id==$id){
            $post->delete();
            }
        }
        session()->put('msg','Category Deleted');
        //you can redirect
        return redirect()->route('categories.index');
    }
}
