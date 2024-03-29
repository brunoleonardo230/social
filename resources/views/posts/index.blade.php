@extends('layouts.app')

@section('content')

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
    
@endsection

