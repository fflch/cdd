<form method="POST" action="/remissivas">
    @csrf
    <ul class="list-group list-group-flush">
        <li class="list-group-item" id="remissiva-add">
            <input class="form-control" type="text" name="texto" value="" >
            <button type="submit" class="btn btn-outline-success btn-sm">Adicionar</button>
        </li>
    </ul>
    <input class="form-control" type="hidden" name="record_id" value="{{ $record->id }}" >
</form>