@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}" class="active">Gestão de Perfis</a></li>
</ol>

<h1>Gestão de Perfis <a href="{{ route('profiles.create') }}" class="btn btn-success"><i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <form action="{{ route('profiles.search') }}" method="POST" class="form form-inline">
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
                    <th width="270">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($profiles as $profile)
                <tr>
                    <td>
                        {{ $profile->name }}
                    </td>
                    <td style="width=10px;">
                        <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-info"><i class="far fa-eye"></i></a>

                        <button type="button" class="btn btn-danger" id="btnModalDeleteProfile" data-toggle="modal" data-target="#ModalDeleteProfile" onclick="setHiddenProfileExcluir({{ $profile->id }})"><i class="fas fa-trash-alt"></i>    
                        </button>

                        <a href="{{ route('profiles.permissions', $profile->id) }}" class="btn btn-warning"><i class="fas fa-lock"></i></a>
                        <a href="{{ route('profiles.plans', $profile->id) }}" class="btn btn-info"><i class="fas fa-list-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal HTML Markup -->
    <div class="modal fade" id="ModalDeleteProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle icone-modal"></i><p class="text-modal">Deseja Realmente Excluir o Registro?</p></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idProfileExcluir" name="idProfileExcluir" value="">
                    <p class="text-modal-seg">Lembre-se: Uma vez excluído, não poderá ser restaurado!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-primary" onClick="excluirProfile()">Sim</button>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        @if (isset($filters))
        {!! $profiles->appends($filters)->links() !!}
        @else
        {!! $profiles->links() !!}
        @endif
    </div>
</div>
@stop
