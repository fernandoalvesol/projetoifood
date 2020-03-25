@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
<h1>Detalhes do plano <b>{{ $plan->name }}</b></h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" placeholder="{{ $plan->name }}" disabled="disable">
        </div>
        <div class="form-group">
            <label>Preço:</label>
            <input type="text" name="price" class="form-control" placeholder="R$ {{ number_format($plan->price, 2, ',', '.') }}" disabled="disable">
        </div>
        <div class="form-group">
            <label>Descrição:</label>
            <input type="text" name="description" class="form-control" placeholder="{{ $plan->description }}" disabled="disable">
        </div>
        <div class="form-group">
            <div class="pull-left">
                <a class="btn btn-success" href="{{ route('plans.index') }}"><i class="fas fa-arrow-circle-left"></i></a>
            </div>
        </div>
        
        @include('admin.includes.alerts')

    </div>
</div>
@endsection
