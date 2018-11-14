<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{ 
	public function getIndex()
	{
		$posts=post::paginate(4);
		return view('blog.index')->withPosts($posts);
	}
    public function getSingle($slug)
    {
    //fetch from the DB based on slug
    	$post=post::where('slug','=',$slug)->first();
        
    	//return to view and pass in the post object
    	return view('blog.single')->withPost($post);
    }
}
