@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('plans.index') }}" class="active">Planos</a></li>
    </ol>
    
    <h1>Planos</h1>    
    <div class="pull-left">
        <a class="btn btn-success" href="{{ route('plans.create') }}"> <i class="fas fa-plus-square"></i> </a>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th width="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>
                                {{ $plan->name }}
                            </td>
                            <td>
                                R$ {{ number_format($plan->price, 2, ',', '.') }}
                            </td>
                            <td style="width=10px;">
                            
                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-info"><i class="far fa-eye"></i></a>
                                
                                <a href="{{ route('plans.edit', $plan->url) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>                                  

                                <button type="button" class="btn btn-danger" id="btnModalDeletePlan" data-toggle="modal" data-target="#ModalDeletePlan" onclick="setHiddenPlanExcluir({{ $plan->id }})">
                                    <i class="fas fa-trash-alt"></i>    
                                </button>

                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="far fa-address-card"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal HTML Markup -->
        <div class="modal fade" id="ModalDeletePlan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Deseja Realmente Excluir o Registro?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idPlanExcluir" name="idPlanExcluir" value="">
                    Lembre-se: Uma vez excluído, não poderá ser restaurado!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
                    <button type="button" class="btn btn-primary" onClick="excluirPlan()">Sim</button>
                </div>
                </div>
            </div>
            </div>

        <div class="card-footer">
            @if (isset($filters))
                {!! $plans->appends($filters)->links() !!}
            @else
                {!! $plans->links() !!}
            @endif
        </div>
    </div>
@stop
