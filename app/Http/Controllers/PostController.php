<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->is_admin == 'V'){
            $posts = $this->post->orderBy('id', 'DESC')->paginate(10);            
        }else{
            $posts = auth()->user()->posts()->orderBy('id', 'DESC')->paginate(10);            
        }
        return view('posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $data = $request->all();
            
            $data['user_id'] = auth()->user()->id;
            $post = $this->post->create($data);

            return redirect()->route('posts.index');
            
        } catch(\Exception $e) {
            
            return redirect()->back();
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        try{
            if(auth()->user()->is_admin == 'V'){
                $post = $this->post->find($id);
            }else{
                $post = auth()->user()->posts->find($id);
            }
            

            if(!$post){
                return redirect()->back()->with(['error' => 'Post não encontrado']);
            }

            return view('posts.edit', compact('post'));

        } catch(\Exception $e) {
            
            return redirect()->back();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        try{
            $data = $request->all();
            $post = $this->post->findOrFail($id);
            $post->update($data);

            return redirect()->route('posts.index');

        } catch(\Exception $e) {
            
            return redirect()->back();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $post = $this->post->findOrFail($id);
            $post->delete();
            
            return redirect()->route('posts.index');

        } catch(\Exception $e) {
            
            return redirect()->back();
        }
    }
}