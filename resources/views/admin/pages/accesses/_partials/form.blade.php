@include('admin.includes.alerts')

<div class="form-group col-md-6">
    <label>Nome do Acesso</label>
    <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ $access->name ?? old('name') }}">
</div>

<div class="form-group col-md-6">
    <label>Descrição do Acesso</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição"
           value="{{ $access->description ?? old('description') }}">
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>