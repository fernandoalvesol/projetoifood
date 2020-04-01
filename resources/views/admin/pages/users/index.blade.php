@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}" class="active">Usuários</a></li>
    </ol>

    <h1>Usuários</h1>    
    <div class="pull-left">
        <a class="btn btn-success" href="{{ route('users.create') }}"> <i class="fas fa-plus-square"></i> </a>
    </div>
@stop

@section('content')

    @include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('users.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="40%">Nome</th>
                        <th width="40%">E-mail</th>
                        <th width="20%">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                                
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="fas fa-wrench"></i></a>

                                <button type="button" class="btn btn-danger" id="btnModalDeleteUsuario" data-toggle="modal" data-target="#ModalDeleteUsuario" onclick="setHiddenUsuarioExcluir({{ $user->id }})">
                                    <i class="fas fa-trash-alt"></i>    
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal HTML Markup -->
        <div class="modal fade" id="ModalDeleteUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle icone-modal"></i><p class="text-modal">Deseja Realmente Excluir o Registro?</p></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idUsuarioExcluir" name="idUsuarioExcluir" value="">
                    <p class="text-modal-seg">Lembre-se: Uma vez excluído, não poderá ser restaurado!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-primary" onClick="excluirUsuario()">Sim</button>
                </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            @if (isset($filters))
                {!! $users->appends($filters)->links() !!}
            @else
                {!! $users->links() !!}
            @endif
        </div>
    </div>
@stop
