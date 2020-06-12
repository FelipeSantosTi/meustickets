@include('admin.includes.alerts')

<div class="form-group col-md-6">
    <label>Perfil de Acesso</label>
    <select name="access_id" class="form-control">
        <option value="3">Acadêmico</option>
        <option value="2">Avaliador</option>
    </select>
</div>

<div class="form-group col-md-6">
    <label>Nome do Usuário</label>
    <input type="text" class="form-control" name="name" placeholder="Nome" value="{{ $user->name ?? old('name') }}">
</div>

<div class="form-group col-md-6">
    <label>E-mail</label>
    <input type="email" class="form-control" name="email" placeholder="E-mail"
        value="{{ $user->email ?? old('email') }}">
</div>

<div class="form-group col-md-6">
    <label>Senha</label>
    <input type="password" class="form-control" name="password" placeholder="***">
</div>

{{-- Confirm password field --}}
<div class="form-group col-md-6">
    <input type="password" name="password_confirmation"
        class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
        placeholder="{{ __('adminlte::adminlte.retype_password') }}">
    @if($errors->has('password_confirmation'))
    <div class="invalid-feedback">
        <strong>{{ $errors->first('password_confirmation') }}</strong>
    </div>
    @endif
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
