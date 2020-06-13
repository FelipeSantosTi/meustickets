@extends('adminlte::page')

@section('title', 'Avaliar Artigo')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="#">Artigos</a></li>
</ol>

<div class="row">
    <div class="col-lg-11">
        <h1>Avaliar Artigo <b>{{ $subscription->title }}</b></h1>
    </div>
    <div class="col-lg-1">
        <a href="{{ route('admin.subscriptions.index') }}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@stop

@section('content')
<form action="{{ route('admin.subscriptions.update', $subscription->id) }}" class="form" method="POST">
    @csrf
    @method('PUT')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Dados do Artigo</h3>
        </div>
        <div class="card-body">
            @include('admin.pages.subscriptions._partials.formav')
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Avaliação</h3>
        </div>
        <div class="card-body">
            @include('admin.pages.subscriptions._partials.formav2')
        </div>
    </div>
</form>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
