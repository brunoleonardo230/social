<?php
    $folowers = isset($folowers)? $folowers : [];
?>
<div class="panel panel-default">
    <div class="panel-heading"><span class="glyphicon glyphicon-user" aria-hidden="true"> Seguidores</div>

    <div class="panel-body">
        <div class="row">
        @forelse($folowers as $folower)                     
            <div class="col-md-4 padding-15">
                <a href="{{ url('perfil-user/'.$folower->id) }}">
                    <img src="{{ url('storage/'.$folower->photo) }}" width="50" alt="{{ $folower->name }}" class="img-circle border">
                </a>
            </div>                        
        @empty
        </div>
        <div class="row">
            <div class="col-md">
            <h2>Nenhum seguidor encontrado!</h2>
            </div>
        </div>
        @endforelse
    </div>
</div>