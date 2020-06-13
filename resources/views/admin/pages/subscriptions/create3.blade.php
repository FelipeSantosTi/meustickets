@extends('adminlte::page')

@section('title', 'Submeter Artigo')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Artigo</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
            <h1>Resultado Final</h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.home') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
