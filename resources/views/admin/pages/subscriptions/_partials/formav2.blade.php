@include('admin.includes.alerts')

<div class="form-group col-md-12">
    <label>Comentário</label>
    <textarea type="text" class="form-control" name="coment" placeholder="Comentário"
        value="{{ $subscription->coment ?? old('coment') }}"></textarea>
</div>

<div class="row">
    <div class="form-group col">
        <label>Nota</label>
        <input type="number" min="0" max="10" step="0.5" class="form-control" name="n1" placeholder="Nota"
            value="{{ $subscription->n1 ?? old('n1') }}">
    </div>

    <div class="form-group col">
        <label>Status</label>
        <select class="form-control" name="status">
            <option value="Aprovado">Aprovado</option>
            <option value="Reprovado">Reprovado</option>
            <option value="Revisão">Revisão</option>
        </select>
    </div>
</div>

<div class="form-group col-md-6">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
