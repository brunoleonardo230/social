<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class PerfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $post;
    private $user;

    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;
        $this->middleware('auth');
    }    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function myPerfil()
    {
        $userId  = auth()->user()->id;
        $perfil = $this->user->find($userId);
        $folowers  = auth()->user()->folowers;        
        $posts = $this->post->where('user_id',$userId)->orderBy('id', 'DESC')->paginate(15);

        //dd($folowers);
        return view('perfil.index', compact('posts','perfil','folowers'));
    }

    public function perfilUser($id){
        $perfil = $this->user->find($id);
        $folowers  = auth()->user()->folowers;        
        $posts = $this->post->where('user_id',$id)->orderBy('id', 'DESC')->paginate(15);

        return view('perfil.perfil', compact('posts','perfil','folowers'));
    }
}
