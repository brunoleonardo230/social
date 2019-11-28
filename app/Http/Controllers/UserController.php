<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }      

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users  = auth()->user()->all();
        
        return view('user.index', compact('users'));
    }

    public function disable($id)
    {
        $user = $this->user->find($id);
        
        if(!$user){
            return redirect()->back()->with(['error' => 'Usuário não existe']);     
        }
        
        try{
            DB::beginTransaction();

                $user->update(['active' => 0]);

            DB::commit();

            return redirect()->back()->with(['success' => 'Usuário desativado com sucesso']);

        }catch(\Exception $e){
            DB::rollBack();

            return redirect()->back()->with(['error' => 'Erro ao desativar usuário']);
        }
        
    }
}
