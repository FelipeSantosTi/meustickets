@extends('adminlte::page')

@section('title', 'Perfis da Permissão')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.permissions.index') }}"
            class="active">Perfis</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
        <h1>Perfis da Permissão <b>{{ $permission->name }}</b></h1>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Perfis</h3>
        </div>

        <div class="card-body">
            <table id="adapt" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    {{-- <th style="width: 50px">Ações</th> --}}
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
                        {{-- <td style="width: 50px">
                            <a href="{{ route('admin.profiles.permissions.detach', [$permission->id, $profile->id]) }}"
                                class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td> --}}
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
