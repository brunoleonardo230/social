@extends('layouts.app')

@section('content')
<div class="col-md-9">
    @include('components.seguidores', ["users" => $users, "title" => 'Usuários'])
</div>
@endsection