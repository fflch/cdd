<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm form-group">  
                <b>Remissiva</b>
                <br>
                <input class="form-control" type="text" name="texto" value="{{  old('texto', $remissiva->texto) }}" >
            </div>
            <div class="col-sm form-group">  
                <b>Registro</b>
                <br>
                <input class="form-control" type="text" name="record_id" value="{{  old('record_id', $remissiva->record_id) }}" >
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Enviar</button>
            <a class="btn btn-outline-dark" href="/" role="button">
                <i class="fas fa-arrow-left"></i> Voltar
            </a>
    </div>
</div>