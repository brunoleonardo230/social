@extends('layouts.app')

@section('content')
    <form action="{{route('posts.update', ['post' => $post->id])}}" method="POST">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label>Post</label>
            <textarea name="post" cols="30" rows="10" class="form-control">{{$post->post}}</textarea>
        </div>

        <button type="submit" class="btn btn-lg btn-success">Atualizar Post</button>
    </form>
    <form action="{{route('posts.destroy', ['post'=>$post->id])}}" method="POST"> 
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="tn btn-lg btn-danger">Deletar post</button>
    </form>
@endsection