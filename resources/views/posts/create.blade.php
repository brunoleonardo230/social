@extends('layouts.app')

@section('content')
    <div class="col-md-9">
        <form action="{{route('posts.store')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label>Post</label>
                <textarea name="post" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-lg btn-success">Criar Post</button>
        </form>
    </div>
@endsection