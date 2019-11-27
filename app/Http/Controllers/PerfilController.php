<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use DB;

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

    public function perfilUser($id)
    {
        $perfil = $this->user->find($id);
        $folowers  = auth()->user()->folowers;        
        $posts = $this->post->where('user_id',$id)->orderBy('id', 'DESC')->paginate(15);

        $bolFollowing = auth()->user()->follow($id);

        return view('perfil.perfil', compact('posts','perfil','folowers','bolFollowing'));
    }

    public function find(Request $request)
    {
        $q = $request->q;

        $result = $this->user->where('name','like',"%{$q}%")->orWhere('email','like',"%{$request->q}%")->paginate(10);
        $folowers  = auth()->user()->folowers;     
        //dd($request->all(), $result);

        return view('perfil.result', compact('result','perfil','folowers','q'));

    }

    public function follow($id)
    {
        $perfil = $this->user->find($id);
        
        if(!$perfil){
            return redirect()->back()->with(['error' => 'Perfil não existe']);     
        }

        if(auth()->user()->follow($id)){
            return redirect()->back()->with(['error' => 'Você já segue este perfil']);            
        }

        try{
            DB::beginTransaction();

                auth()->user()->folowers()->attach([$id]);

            DB::commit();

            return redirect()->back()->with(['success' => 'Sucesso']);

        }catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with(['error' => 'Erro ao tentar seguir este perfil']);
        }
        
    }
}
