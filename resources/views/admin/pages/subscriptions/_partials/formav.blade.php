@include('admin.includes.alerts')

<div class="form-group col-md-6">
    <label>Título do Artigo</label>
    <input type="number" class="form-control" min="0" max="10" step="0.5" name="title" placeholder="Titulo" value="{{ $subscription->title ?? old('title') }}">
</div>

<div class="form-group col-md-6">
    <label>Resumo do Artigo</label>
    <input type="textarea" class="form-control" name="resume" placeholder="Resumo"
           value="{{ $subscription->resume ?? old('resume') }}">
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
