@extends('adminlte::page')

@section('title', 'Usuários')

@section('content_header')
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
  <li class="breadcrumb-item active"><a href="{{ route('admin.users.index') }}" class="active">Usuários</a></li>
</ol>

<div class="row">
  <div class="col-lg-11">
    <h1>Usuários</h1>
  </div>
  <div class="col-lg-1">
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Novo</a>
  </div>
</div>
@stop

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Usuários</h3>
        </div>

        <div class="card-body">
          <table id="adapt" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Nome</th>
                {{-- <th>E-mail</th> --}}
                <th>Perfil</th>
                <th style="width: 100px">Ações</th>
              </tr>
            </thead>

            <tbody>
              @foreach($users as $user)
              <tr>
                <td>
                  {{ $user->name }}
                </td>
                {{-- <td>
                  {{ $user->email }}
                </td> --}}
                <td>
                  <?php if ($user->access_id == '1') { ?>
                  <p>Administrador</p>
                  <?php } ?>

                  <?php if ($user->access_id == '2') { ?>
                  <p>Avaliador</p>
                  <?php } ?>

                  <?php if ($user->access_id == '3') { ?>
                  <p>Acadêmico</p>
                  <?php } ?>
                </td>
                <td style="width: 100px">
                  <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-primary">
                    <i class="far fa-eye"></i></a>
                  <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('dist/adapt.js') }}"></script>
@stop
