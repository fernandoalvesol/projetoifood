@extends('adminlte::page')

@section('title', "Detalhes da categoria {$category->name}")

@section('content_header')
    <h1>Detalhes da categoria <b>{{ $category->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $category->name }}
                </li>
                <li>
                    <strong>URL: </strong> {{ $category->url }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $category->description }}
                </li>
            </ul>            
        
            <div class="form-group">
                <div class="pull-left">
                    <a class="btn btn-success" href="{{ route('categories.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
