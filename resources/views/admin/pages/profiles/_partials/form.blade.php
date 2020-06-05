@include('admin.includes.alerts')

<div class="form-group col-md-6">
    <label>Nome do Perfil</label>
    <input type="text" class="form-control" name="name" placeholder="Nome"
    value="{{ $profile->name ?? old('name') }}">
</div>

<div class="form-group col-md-6">
    <label>Descrição do Perfil</label>
    <input type="text" class="form-control" name="description" placeholder="Descrição"
    value="{{ $profile->description ?? old('description') }}">
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
