@extends('adminlte::page')

@section('title', 'Perfis Disponíveis')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.accesses.index') }}">Acessos</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.accesses.profiles', $access->id) }}">Perfis</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.accesses.profiles.availables', $access->id) }}"
        class="active">Disponíveis</a></li>
</ol>

<div class="row">
    <div class="col-lg-11">
        <h1>Perfis Disponíveis Para o Acesso <b>{{ $access->name }}</b></h1>
    </div>
    <div class="col-lg-1">
        <a href="{{ route('admin.profiles.index') }}" class="btn btn-primary">Voltar</a>
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
                <th width=50px>#</th>
                <th>Nome</th>
                <th>Descrição</th>
            </tr>
            </thead>

            <tbody>
            <form action="{{ route('admin.accesses.profiles.attach', $access->id) }}" method="POST">
                @csrf
                @foreach($profiles as $profile)
                <tr>
                    <td>
                        <input type="checkbox" name="profiles[]" value="{{ $profile->id }}">
                    </td>
                    <td>
                        {{ $profile->name }}
                    </td>
                    <td>
                        {{ $profile->description }}
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
