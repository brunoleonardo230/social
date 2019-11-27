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
                                <li role="presentation"><a href="#">Perfil</a></li>
                                <li role="presentation"><a href="#">Resetar Senha</a></li>
                            </ul>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Perfil</div>

                <div class="panel-body">
                    @include('components.busca-perfis')

                    @if($perfil)
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{url('storage/'.$perfil->photo)}}" width="120" alt="User" class="img-circle border img-responsive center-block">
                            </div>
                            <div class="col-md-12">
                                <h3 align="center">{{$perfil->name}}</h3>
                                <h4 align="center">{{$perfil->email}}</h4>
                                <h4 align="center">{{$perfil->address}}</h4>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md">
                            <h2>Perfil não encontrado!</h2>
                            </div>
                        </div>
                    @endif   
                    @forelse($posts as $post)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <img src="{{url('storage/user.jpg')}}" width="50" alt="User" class="img-circle border">
                                        {{$post->name}} - {{$post->created_at}}
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                        {{$post->post}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="row">
                            <div class="col-md">
                            <h2>Nenhum post encontrado!</h2>
                            </div>
                        </div>
                    @endforelse     
                    {{$posts->links()}}                                        
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('components.seguidores', ["folowers" => $folowers])
        </div>
    </div>
</div>
@endsection
