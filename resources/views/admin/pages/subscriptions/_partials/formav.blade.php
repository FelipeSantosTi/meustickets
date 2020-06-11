@include('admin.includes.alerts')

<div class="form-group col-md-12">
    <label>Título do Artigo</label>
    <input type="text" class="form-control" name="title" placeholder="Titulo"
        value="{{ $subscription->title ?? old('title') }}" disabled>
</div>

<div class="form-group col-md-12">
    <label>Resumo do Artigo</label>
    <textarea type="text" class="form-control" name="resume" placeholder="Resumo"
        value="{{ $subscription->resume ?? old('resume') }}" disabled></textarea>
</div>

<div class="form-group col-md-2">
    <label>Nota</label>
    <input type="number" min="0" max="10" step="0.5" class="form-control" name="n1" placeholder="Nota"
        value="{{ $subscription->n1 ?? old('n1') }}">
</div>



<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
