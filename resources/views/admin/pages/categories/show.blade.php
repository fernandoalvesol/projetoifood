@extends('adminlte::page')

@section('title', "Detalhes da categoria {$category->name}")

@section('content_header')
<h1>Detalhes da categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $category->name }}" disabled="disabled">
        </div>        
        
        <div class="form-group">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('categories.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
