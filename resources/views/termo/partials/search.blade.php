<div class="card">
    <div class="card-header">
        <span><b>Busca</b></span>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm input-group">
                <input type="text" class="form-control" name="search" type="text" placeholder="Digite o assunto, a remissiva ou o cdd..." value="{{ request()->search }}" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm input-group" id="query-select-group">
                <span><b>Categoria</b></span>
                <select class="form-select" name="categoria">
                    <option selected value="">--Selecione--</option>
                    <option value="Assunto">Assunto</option>
                    <option value="Coleção">Coleção</option>
                    <option value="Autor">Autor</option>
                </select>
            </div>
            <div class="col-sm input-group" id="query-select-group">
                <span><b>Enviado para Sibi</b></span>
                <select class="form-select" name="enviado_para_sibi">
                    <option selected value="">--Selecione--</option>
                    <option value="1" @if( request()->enviado_para_sibi == "1") selected @endif>Sim</option>
                    <option value="0" @if( request()->enviado_para_sibi == "0") selected @endif>Não</option>
                </select>
            </div>
            <div class="col-sm input-group" id="query-select-group">
                <span><b>Normalizado</b></span>
                <select class="form-select" name="normalizado">
                    <option selected value="">--Selecione--</option>
                    <option value="1"  @if( request()->normalizado == "1") selected @endif>Sim</option>
                    <option value="0"  @if( request()->normalizado == "0") selected @endif>Não</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm input-group">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </span>
            </div>
        </div>
    </div>
</div>
