@extends('adminlte::page')

@section('title', 'Submeter Artigo')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Artigo</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
            <h1>Revisar Artigo</h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.home') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Preencha os campos</h3>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.subscriptions.update', $subscription->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')
                @include('admin.pages.subscriptions._partials.form')
            </form>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
