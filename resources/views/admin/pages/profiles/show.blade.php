@extends('adminlte::page')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')
<h1>Detalhes do perfil <b>{{ $profile->name }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>* Nome:</label>
            <input type="text" name="name" class="form-control" placeholder="{{ $profile->name}}" disabled="disabled">
        </div>
        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="description" class="form-control" placeholder="{{ $profile->description}}" disabled="disabled">
        </div>
        

        @include('admin.includes.alerts')

        <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
            <a class="btn btn-success" href="{{ route('plans.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
        </form>
    </div>
</div>
@endsection
