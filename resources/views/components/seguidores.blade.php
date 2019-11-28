<?php
    $users = isset($users)? $users : [];
    $title = isset($title)? $title : 'Seguidores';
?>
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"> {{$title}}</div>

    <div class="panel-body">
        <div class="row">
        @forelse($users as $user)                     
            <div class="col-md-6 card-user padding-15 text-center">
                <a href="{{ url('perfil-user/'.$user->id) }}">
                    <img src="{{ asset($user->photo) }}" width="50" alt="{{ $user->name }}" class="img-circle border"><br>
                    {{$user->name}}
                </a>
                
                @if(Auth::user()->is_admin=='V' && $user->active)
                    <br>
                    <a href="{{url('user/'.$user->id.'/disable')}}" class="btn-sm btn-danger">Desativar</a>
                @endif
            </div>                        
        @empty
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Nenhum seguidor encontrado!</h2>
            </div>
        </div>
        @endforelse
    </div>
</div>