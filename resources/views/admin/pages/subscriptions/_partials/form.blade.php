@include('admin.includes.alerts')

<div class="form-group col-md-12">
    <label>Título do Artigo</label>
    <input type="text" class="form-control" name="title" placeholder="Titulo"
        value="{{ $subscription->title ?? old('title') }}">
</div>

<div class="form-group col-md-12">
    <label>Resumo do Artigo</label>
    <textarea type="text" cols="30" rows="5" class="form-control" name="resume"
        placeholder="Resumo">{{ $subscription->resume ?? old('resume') }}</textarea>
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
