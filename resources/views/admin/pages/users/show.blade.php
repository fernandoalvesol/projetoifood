@extends('adminlte::page')

@section('title', "Detalhes do usuário {$user->name}")

@section('content_header')
<h1>Detalhes do usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $user->name }}" disabled="disabled">
        </div>
        <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control" placeholder="Nome:" value="{{ $user->email }}" disabled="disabled">
        </div>
        <div class="form-group">
            <a class="btn btn-success" href="{{ route('users.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
        </div>
    </div>
</div>
@endsection
