@extends('adminlte::page')

@section('title', 'Editar Acesso')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Acessos</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
            <h1>Editar Acesso <b>{{ $access->name }}</b></h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.accesses.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Preencha os campos</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.accesses.update', $access->url) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.accesses._partials.form')
            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop