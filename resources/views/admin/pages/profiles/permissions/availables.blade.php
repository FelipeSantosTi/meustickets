@extends('adminlte::page')

@section('title', 'Permissões Disponíveis')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.profiles.index') }}" class="active">Perfis</a></li>
</ol>

<div class="row">
    <div class="col-lg-11">
        <h1>Permissões Disponíveis do Perfil <b>{{ $profile->name }}</b></h1>
    </div>
    <div class="col-lg-1">
        <a href="{{ route('admin.profiles.index') }}" class="btn btn-primary">Voltar</a>
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
                <th width=50px>#</th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
            </thead>

            <tbody>
            <form action="{{ route('admin.profiles.permissions.attach', $profile->id) }}" method="POST">
                @csrf
                @foreach($permissions as $permission)
                <tr>
                    <td>
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                    </td>
                    <td>
                        {{ $permission->name }}
                    </td>
                    <td>
                        {{ $permission->description }}
                    </td>
                </tr>
                @endforeach

                <tr>
                    <td colspan="500">
                        @include('admin.includes.alerts')

                        <button type="submit" class="btn btn-warning">Vincular</button>
                    </td>
                </tr>
            </form>
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
