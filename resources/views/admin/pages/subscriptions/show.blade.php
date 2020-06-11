@extends('adminlte::page')

@section('title', 'Detalhes do Artigo')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="#">Detalhes do Artigo</a></li>
</ol>

<div class="row">
    <div class="col-lg-11">
        <h1>Detalhes do Artigo</h1>
    </div>
    <div class="col-lg-1">
        <a href="{{ route('admin.subscriptions.consult') }}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Dados Gerais</h3>
    </div>

    <div class="card-body">
        <table id="adapt" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Status</th>
                    <th style="width: 70px">Nota 1</th>
                    <th style="width: 70px">Nota 2</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>
                        {{ $subscription->title }}
                    </td>
                    <td>
                        {{ $subscription->status }}
                    </td>
                    <td>
                        {{ $subscription->n1 }}
                    </td>
                    <td>
                        {{ $subscription->n2 }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @stop
