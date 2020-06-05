@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.permissions.index') }}" class="active">Permissões</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
            <h1>Permissões</h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.permissions.create') }}" class="btn btn-primary">Novo</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Permissões</h3>
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
                @foreach($permissions as $permission)
                    <tr>
                        <td>
                            {{ $permission->name }}
                        </td>
                        <td>
                            {{ $permission->description }}
                        </td>
                        <td style="width: 100px">
                            <a href="{{ route('admin.permissions.show', $permission->id) }}" class="btn btn-primary">
                                <i class="far fa-eye"></i></a>
                            <a href="{{ route('admin.permissions.edit', $permission->id) }}" class="btn btn-warning">
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
