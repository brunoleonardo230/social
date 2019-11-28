@extends('layouts.app')

@section('content')

        <div class="col-md-6"> 
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Resultado busca</div>

                <div class="panel-body">
                    @include('components.busca-perfis') 
                    <table class="table">
                        <tbody>
                            @forelse($result as $perfil)
                            <tr>
                                <td>                                    
                                    <img src="{{ url('storage/'.$perfil->photo) }}" width="50" alt="{{ $perfil->name }}" class="img-circle border">                                    
                                
                                    <a href="{{ url('perfil-user/'.$perfil->id) }}">
                                        {{ $perfil->name }}
                                    </a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>
                                        <h2>Nenhum perfil encontrado!</h2>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{$result->links()}}
                </div>
            </div>
        </div>   
        <div class="col-md-3">
            @include('components.seguidores', ["users" => $folowers])
        </div>
    
@endsection
