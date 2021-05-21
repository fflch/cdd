<form method="POST" action="/remissivas">
    @csrf
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <input class="form-control" type="text" name="titulo" value="" >
            <br>
            <button type="submit" class="btn btn-outline-success btn-sm">Adicionar</button>
        </li>
    </ul>
    <input class="form-control" type="hidden" name="termo_id" value="{{ $termo->id }}" >
</form>