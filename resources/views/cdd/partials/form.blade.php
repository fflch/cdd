<div class="card">
  <div class="card-header">
    <b>Novo CDD</b>
  </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm form-group">  
                <b>CDD</b>
                <br>
                <input type="text" class="form-control" name="cdd" value="{{  old('cdd', $cdd->cdd) }}" >
            </div>
        </div>
        <button type="submit" class="btn btn-success"> Enviar </button>   
        <a class="btn btn-outline-dark" href="/cdd" role="button">
          <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>