@extends('layouts.app')

@section('content')
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Feed</div>

                <div class="panel-body">
                    @include('components.busca-perfis')
                    
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
@endsection
