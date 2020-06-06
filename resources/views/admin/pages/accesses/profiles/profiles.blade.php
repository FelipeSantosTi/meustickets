@extends('adminlte::page')

@section('title', 'Perfis do Acesso')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.accesses.index') }}">Acessos</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.accesses.profiles', $access->id) }}"
            class="active">Perfis</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
        <h1>Perfis do Acesso <b>{{ $access->name }}</b></h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.accesses.profiles.availables', $access->id) }}"
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
                @foreach($profiles as $profile)
                    <tr>
                        <td>
                            {{ $profile->name }}
                        </td>
                        <td>
                            {{ $profile->description }}
                        </td>
                        <td style="width: 50px">
                            <a href="{{ route('admin.accesses.profiles.detach', [$access->id, $profile->id]) }}"
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
