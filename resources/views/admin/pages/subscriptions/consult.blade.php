@extends('adminlte::page')

@section('title', 'Artigos')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('admin.subscriptions.index') }}" class="active">Artigos</a></li>
    </ol>

    <div class="row">
        <div class="col-lg-11">
            <h1>Artigos</h1>
        </div>
        <div class="col-lg-1">
            <a href="{{ route('admin.subscriptions.create') }}" class="btn btn-primary">Novo</a>
        </div>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Lista de Artigos</h3>
        </div>

        <div class="card-body">
            <table id="adapt" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Status</th>
                    <th style="width: 50px">Ações</th>
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
                        <td style="width: 70px">
                            <a href="{{ route('admin.subscriptions.show', $subscription->id) }}" class="btn btn-primary">
                                <i class="far fa-eye"></i></a>
                        </td>
                    </tr>
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
