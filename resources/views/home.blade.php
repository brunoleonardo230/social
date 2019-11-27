@extends('layouts.app')

@section('content')
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Feed</div>

                <div class="panel-body">
                    @include('components.busca-perfis')
                    
                    @include('components.post-list')                            
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('components.seguidores', ["folowers" => $folowers])
        </div>
@endsection
