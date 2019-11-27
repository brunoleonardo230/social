@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span> User</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md">
                            <img src="{{url('storage/user.jpg')}}" width="120" alt="User" class="img-circle border img-responsive center-block">
                        </div>
                        <div clas="col-md">
                            <ul class="nav nav-pills nav-stacked">
                                <li role="presentation"><a href="{{route('home')}}">Feed</a></li>
                                <li role="presentation"><a href="{{route('posts.index')}}">Posts</a></li>
                                <li role="presentation"><a href="{{route('perfil')}}">Perfil</a></li>
                                <li role="presentation"><a href="#">Resetar Senha</a></li>
                            </ul>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-12">
                <a href="{{route('posts.create')}}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Criar Postagem</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Titulo</th>
                        <th>Criado em</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>
                            <a href="{{route('posts.show', ['post' => $post->id])}}">
                            {{substr($post->post,0,40)}} ...
                            </a>
                        </td>
                        <td>{{$post->created_at}}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">
                                <h2>Nenhum post encontrado!</h2>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{$posts->links()}}
        </div>        
    </div>
</div>        
@endsection

