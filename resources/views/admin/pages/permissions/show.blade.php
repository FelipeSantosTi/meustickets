@extends('adminlte::page')

@section('title', 'Detalhes do Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Detalhes da Permissão</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
            <h1>Detalhes da Permissão <b>{{ $permission->name }}</b></h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.permissions.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dados Gerais</h3>
        </div>

        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $permission->name }}
                </li>

                <li>
                    <strong>Descrição: </strong> {{ $permission->description }}
                </li>
            </ul>

            <div class="form-group col-md-6">
                <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                </form>
            </div>


        </div>
    </div>
@stop
