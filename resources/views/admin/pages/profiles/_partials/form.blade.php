@include('admin.includes.alerts')

<div class="form-group col-md-6">
    <label>Nome do Perfil</label>
    <input type="text" class="form-control" name="nome" placeholder="Nome" value="{{ $perfil->nome ?? old('nome') }}">
</div>

<div class="form-group col-md-6">
    <label>Descrição do Perfil</label>
    <input type="text" class="form-control" name="descricao" placeholder="Descrição"
           value="{{ $perfil->descricao ?? old('descricao') }}">
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>