@extends('adminlte::page')

@section('title', "Detalhes da permissão {$permission->name}")

@section('content_header')
    <h1>Detalhes da permissão <b>{{ $permission->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $permission->description }}
                </li>
            </ul>

            <div class="form-group">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('permissions.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>
        </div>
    </div>
@endsection
