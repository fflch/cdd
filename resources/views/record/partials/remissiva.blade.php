<form method="POST" action="/remissivas">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm form-group">  
                    <b>Remissiva</b>
                    <br>
                    <input class="form-control" type="text" name="texto" value="" >
                </div>
                <input class="form-control" type="hidden" name="record_id" value="{{ $record->id }}" >

            </div>
            <button type="submit" class="btn btn-outline-success">Enviar</button>
        </div>
    </div>
</form>