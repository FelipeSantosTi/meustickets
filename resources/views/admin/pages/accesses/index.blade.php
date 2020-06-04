@extends('adminlte::page')

@section('title', 'Acessos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.accesses.index') }}" class="active">Acessos</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
            <h1>Acessos</h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.accesses.create') }}" class="btn btn-primary">Novo</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Acessos</h3>
        </div>

        <div class="card-body">
            <table id="adapt" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th style="width: 50px">Ações</th>
                </tr>
                </thead>

                <tbody>
                @foreach($accesses as $access)
                    <tr>
                        <td>
                            {{ $access->name }}
                        </td>
                        <td>
                            {{ $access->description }}
                        </td>
                        <td style="width: 100px">
                            <a href="{{ route('admin.accesses.show', $access->url) }}" class="btn btn-primary">
                                <i class="far fa-eye"></i></a>
                            <a href="{{ route('admin.accesses.edit', $access->url) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('dist/adapt.js') }}"></script>
@stop