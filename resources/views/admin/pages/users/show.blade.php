@extends('adminlte::page')

@section('title', "Detalhes do usuário {$user->name}")

@section('content_header')
    <h1>Detalhes do usuário <b>{{ $user->name }}</b></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $user->name }}
                </li>
                <li>
                    <strong>E-mail: </strong> {{ $user->email }}
                </li>
                <li>
                    <strong>Empresa: </strong> {{ $user->tenant->name }}
                </li>
            </ul>
            <div class="form-group">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('users.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>
        </div>
    </div>
@endsection
