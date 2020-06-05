@include('admin.includes.alerts')

<div class="form-group col-md-6">
    <label>Nome da Permissão</label>
    <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ $permission->name ?? old('name') }}">
</div>

<div class="form-group col-md-6">
    <label>Descrição da Permissão</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição"
           value="{{ $permission->description ?? old('description') }}">
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
