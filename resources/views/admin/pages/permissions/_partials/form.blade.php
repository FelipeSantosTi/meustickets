@include('admin.includes.alerts')

<div class="form-group col-md-6">
    <label>Nome da Permissão</label>
    <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $permission->nome ?? old('nome') }}">
</div>

<div class="form-group col-md-6">
    <label>Descrição da Permissão</label>
    <input type="text" class="form-control" name="descricao" placeholder="Descrição"
           value="{{ $permission->descricao ?? old('descricao') }}">
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>