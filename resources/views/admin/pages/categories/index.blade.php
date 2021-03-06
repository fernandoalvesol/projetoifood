@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" class="active">Gestão de Categorias</a></li>
</ol>

<h1>Gestão de Categorias</h1> 
<a class="btn btn-success" href="{{ route('categories.create') }}"> <i class="fas fa-plus-square"></i> </a>


@stop

@section('content')
@include('admin.includes.alerts')
<div class="card">
    <div class="card-header">
        <form action="{{ route('categories.search') }}" method="POST" class="form form-inline">
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
                    <th width="40%">Descrição</th>
                    <th width="20%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>                            
                    <td>

                        <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>

                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i class="fas fa-wrench"></i></a>                                  

                        <button type="button" class="btn btn-danger" id="btnModalDeleteCategoria" data-toggle="modal" data-target="#ModalDeleteCategoria" onclick="setHiddenCategoriaExcluir({{ $category->id }})">
                            <i class="fas fa-trash-alt"></i>    
                        </button>                                

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal HTML Markup -->
    <div class="modal fade" id="ModalDeleteCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle icone-modal"></i><p class="text-modal">Deseja Realmente Excluir o Registro?</p></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idCategoriaExcluir" name="idCategoriaExcluir" value="">
                    <p class="text-modal-seg">Lembre-se: Uma vez excluído, não poderá ser restaurado!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-primary" onClick="excluirCategoria()">Sim</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer">
        @if (isset($filters))
        {!! $categories->appends($filters)->links() !!}
        @else
        {!! $categories->links() !!}
        @endif
    </div>
</div>
@stop
