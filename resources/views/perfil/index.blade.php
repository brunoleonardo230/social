@extends('layouts.app')

@section('content')

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Perfil</div>

                <div class="panel-body">
                    @include('components.busca-perfis')

                    @if($perfil)
                        <div class="row">
                            <div class="col-md-12">
                                <img src="{{asset($perfil->photo)}}" width="120" alt="User" class="img-circle border img-responsive center-block">
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
                    @include('components.post-list')                                       
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('components.seguidores', ["users" => $folowers])
        </div>
    
@endsection
