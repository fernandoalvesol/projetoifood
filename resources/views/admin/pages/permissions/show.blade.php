@extends('adminlte::page')

@section('title', "Detalhes da permissão {$permission->name}")

@section('content_header')
<h1>Detalhes da permissão <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>* Nome:</label>
            <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $permission->name }}" disabled="disabled">
        </div>
        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $permission->description }}" disabled="disabled">
        </div>
        <div class="form-group">            
            <a class="btn btn-success" href="{{ route('permissions.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
        </div>
    </div>
</div>
@endsection
