@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}" class="active">Permissões</a></li>
    </ol>

    <h1>Permissões</h1>    
    <div class="pull-left">
        <a class="btn btn-success" href="{{ route('permissions.create') }}"> <i class="fas fa-plus-square"></i> </a>
    </div>
@stop

@section('content')
@include('admin.includes.alerts')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="250">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td>
                                {{ $permission->name }}
                            </td>
                            <td style="width=10px;">                                

                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                                
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                <button type="button" class="btn btn-danger" id="btnModalDeletePermissao" data-toggle="modal" data-target="#ModalDeletePermissao" onclick="setHiddenPermissaoExcluir({{ $permission->id }})">
                                    <i class="fas fa-trash-alt"></i>    
                                </button>

                                <a href="{{ route('permissions.profiles', $permission->id) }}" class="btn btn-warning"><i class="far fa-address-card"></i></a>                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal HTML Markup -->
        <div class="modal fade" id="ModalDeletePermissao" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja Realmente Excluir o Registro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idPermissaoExcluir" name="idPermissaoExcluir" value="">
                    Lembre-se: Uma vez excluído, não poderá ser restaurado!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-primary" onClick="excluirPermissao()">Sim</button>
                </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
        </div>
    </div>
@stop
