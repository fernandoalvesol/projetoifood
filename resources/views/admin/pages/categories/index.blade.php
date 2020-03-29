@extends('adminlte::page')

@section('title', 'Categorias')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('categories.index') }}" class="active">Categorias</a></li>
    </ol>
<<<<<<< HEAD

    <h1>Categorias <a href="{{ route('categories.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
=======
    
    <h1>Categorias</h1>    
    <div class="pull-left">
        <a class="btn btn-success" href="{{ route('categories.create') }}"> <i class="fas fa-plus-square"></i> </a>
    </div>
@stop

@section('content')
@include('admin.includes.alerts')
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.search') }}" method="POST" class="form form-inline">
                @csrf
<<<<<<< HEAD
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
=======
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? '' }}">                
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
<<<<<<< HEAD
                        <th width="150">Ações</th>
=======
                        <th width="200">Ações</th>
>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
<<<<<<< HEAD
                            <td>{{ $category->description }}</td>
                            <td style="width=10px;">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-warning">VER</a>
=======
                            <td>{{ $category->description }}</td>                            
                            <td style="width=10px;">
                            
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                                
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>                                  

                                <button type="button" class="btn btn-danger" id="btnModalDeleteCategoria" data-toggle="modal" data-target="#ModalDeleteCategoria" onclick="setHiddenCategoriaExcluir({{ $category->id }})">
                                    <i class="fas fa-trash-alt"></i>    
                                </button>                                

>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
<<<<<<< HEAD
=======

        <!-- Modal HTML Markup -->
        <div class="modal fade" id="ModalDeleteCategoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja Realmente Excluir o Registro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idCategoriaExcluir" name="idCategoriaExcluir" value="">
                    Lembre-se: Uma vez excluído, não poderá ser restaurado!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-primary" onClick="excluirCategoria()">Sim</button>
                </div>
                </div>
            </div>
        </div>

>>>>>>> 0564cfe9d62a2e2944b035da20b7865548376e17
        <div class="card-footer">
            @if (isset($filters))
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif
        </div>
    </div>
@stop
