<?php
    $q = isset($q)? $q : '';
?>
<form class="form-inline" action="{{url('find')}}">
    <div class="row">
        <div class="form-group">
            <div class="col-md-12 padding-15">
                <input type="text" class="form-control" name="q" value="{{ $q }}" placeholder="Pesquisar perfil">
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar</button>
            </div>
        </div>
    </div>
</form>
<hr>    