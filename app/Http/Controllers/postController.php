<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Reqquests;
use Illuminate\Support\Facades\Inputs;
use Session;
use App\Category;
use Image;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //create a variable and store all the blog posts in it from the database
        // $posts= post::all();
           // $posts= post::Paginate(5);
                $posts= post::orderBy('id','desc')->Paginate(5);
        //return a view and pass in the above variable
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=category::all();
      return view('posts.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validaten the data
        $this->validate($request,array(
            'title'=>'required|max:255',
            'body'=>'required',
            'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id'=>'required|integer'
        ));
        //store in database
        $post=new post;
        $post->title= $request->title;
        $post->body= $request->body;
        $post->slug=$request->slug;
        $post->category_id=$request->category_id;

        //save image
        if($request->hasfile('featured_image'))
        {
            $image=$request->file('featured_image');
            $filename=time().'.'.$image->getClientOriginalExtension();
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(800,400)->save($location);

            $post->image=$filename;

        }

        $post->save();
        //redirect
        Session::flash('success','The blog post is successsfully saved!');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=post::find($id);
     return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //find the post in the database and save as a var
        $post=post::find($id);
        $categories=category::all();
        $cats=array();
        foreach($categories as $category)
        {
            $cats[$category->id]=$category->name;
        }
     
        //return the view and pass in the var we previously created
        return view('posts.edit')->withPost($post)->withCategories($cats);
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
        //validate data
        $post=post::find($id);
        if($request->input('slug')==$post->slug){
        $this->validate($request,array(
            'title'=>'required|max:255',
            'body'=>'required',
            'category_id'=>'required|integer'
           
        ));
    }
    else
    {
     $this->validate($request,array(
        'title'=>'required|max:255',
        'body'=>'required',
       'slug'=>'required|alpha_dash|min:5|max:255|unique:posts,slug',
       'category_id'=>'required|integer'
          
        ));
    }

        //save the data into database
        $post=post::find($id);
        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->slug=$request->input('slug');
        $post->category_id=$request->input('category_id');
        $post->save();

        //set flash data with success message
        Session::flash('success','this post was successfully saved.');
        //redirect with flash data to posts.show
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=post::find($id);
        $post->delete();
        Session::flash('success','the post was successfully deleted.');
        return redirect()->route('posts.index');
    }
}
