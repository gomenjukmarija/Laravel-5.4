<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index ()
    {
    	return view('posts.index');
    }

    public function show ()
    {
    	return view('posts.show');
    }

    public function create ()
    {
    	return view('posts.create');
    }

    public function store ()
    {
    	//Create a new post using the request data
    	//$post = new Post;

       //Save to database
    	// $post->title = request('title');
    	// $post->body = request('body');    	
    	// $post->save();

    	Post::create([
    			'title' => request('title'),
    			'body' => request('body')
    	]);


    	//and then redirect to homepage
    	return redirect('/');
    }   
}