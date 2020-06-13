@extends('adminlte::page')

@section('title', 'Artigos')

@section('content_header')
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
    <li class="breadcrumb-item active"><a href="{{ route('admin.subscriptions.index') }}" class="active">Artigo</a>
    </li>
</ol>

<div class="row">
    <div class="col-lg-11">
        <h1>Artigo</h1>
    </div>
</div>
@stop

@section('content')
<div class="card">
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
                        <?php if ($subscription->status === 'Submetido') { ?>
                        <span class="badge badge-pill badge-primary">{{ $subscription->status }}</span>
                        <?php } ?>

                        <?php if ($subscription->status === 'Submetido Revisado') { ?>
                        <span class="badge badge-pill badge-primary">{{ $subscription->status }}</span>
                        <?php } ?>

                        <?php if ($subscription->status === 'Aprovado') { ?>
                        <span class="badge badge-pill badge-success">{{ $subscription->status }}</span>
                        <?php } ?>

                        <?php if ($subscription->status === 'Reprovado') { ?>
                        <span class="badge badge-pill badge-danger">{{ $subscription->status }}</span>
                        <?php } ?>

                        <?php if ($subscription->status === 'Revisão') { ?>
                        <span class="badge badge-pill badge-warning">{{ $subscription->status }}</span>
                        <?php } ?>
                    </td>
                    <td style="width: 70px">
                        <a href="{{ route('admin.subscriptions.show', $subscription->id) }}" class="btn btn-primary">
                            <i class="far fa-eye"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop
