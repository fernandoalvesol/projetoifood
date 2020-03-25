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

                                {!! Form::open(['method' => 'DELETE','route' => ['plans.destroy', $plan->id],'style'=>'display:inline']) !!}
                                                                                                                         
                                    {!! 
                                        Form::button('<i class="fas fa-trash-alt"></i>', [
                                        'class' => 'btn btn-danger','data-toggle'=>'confirmation','data-placement'=>'left', 'data-singleton'=>'true',
                                        'data-title'=>'Deseja Realmente Excluir?',
                                        'data-btn-cancel-label'=>'Não', 'data-btn-ok-label'=>'Sim' ]) 
                                    !!}
                                                                            
                                {!! Form::close() !!}

                                <a href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-warning"><i class="far fa-address-card"></i></a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
