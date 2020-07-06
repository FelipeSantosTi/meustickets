@extends('adminlte::page')

@section('title', 'Usuário')

@section('content_header')
    <h1>Dados {{ auth()->user()->name }}</h1>
@stop

@section('content')
    <p>Informações do evento</p>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
