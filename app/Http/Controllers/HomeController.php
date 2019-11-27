<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('auth');
    }    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $folowers  = auth()->user()->folowers;
        $posts = auth()->user()->folowersPosts()->orderBy('id', 'DESC')->paginate(15);
        //dd($posts);
        //$posts = $this->post->orderBy('id', 'DESC')->paginate(15);
        return view('home', compact('posts','folowers'));
    }
}
