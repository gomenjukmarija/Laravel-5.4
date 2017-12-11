<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Repository\Posts;

class PostsController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth')->except(['index','show']);
    }

    public function index (Posts $posts)
    {
    	$posts = Post::latest()
            ->filter(request()->only(['month', 'year']))
            ->get();

        $archives = Post::archives();

    	return view('posts.index', compact('posts', 'archives'));
    }


    public function show (Post $post)
    {
    	return view('posts.show',compact('post'));
    }

    public function create ()
    {
    	return view('posts.create');
    }

    public function store ()
    {
    	$this->validate(request(), [
    			'title' => 'required',
    			'body' => 'required'
    		]);

        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        session()->flash('message', 'Your post has now be published!');

    	//and then redirect to homepage
    	return redirect('/');
    }   
}