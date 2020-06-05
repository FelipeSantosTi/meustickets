@extends('adminlte::page')

@section('title', 'Permissões do Perfil')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.profiles.index') }}"
            class="active">Perfis</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
        <h1>Permissões do Perfil <b>{{ $profile->name }}</b></h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.profiles.permissions.availables', $profile->id) }}"
                class="btn btn-primary">Novo</a>
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
                        <td style="width: 50px">
                            <a href="{{ route('admin.profiles.permissions.detach', [$profile->id, $permission->id]) }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
