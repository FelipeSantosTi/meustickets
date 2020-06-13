@include('admin.includes.alerts')

<div class="form-group col-md-12">
    <label>Título do Artigo</label>
    <input type="text" class="form-control" name="title" placeholder="Titulo"
        value="{{ $subscription->title ?? old('title') }}" disabled>
</div>

<div class="form-group col-md-12">
    <label>Resumo do Artigo</label>
    <textarea type="text" class="form-control" name="resume"
        disabled>{{ $subscription->resume}}</textarea>
</div>
