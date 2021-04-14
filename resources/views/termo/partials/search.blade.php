<div class="card">
    <div class="card-header">
        <span><b>Busca por</b></span>
        <select class="form-select">
            <option selected>--Selecione--</option>
            <option onclick="select('input_busca_assunto')">Assunto ou Remissiva</option>
            <option onclick="select('input_busca_cdd')">CDD</option>
            <option onclick="select('input_busca_observacao')">Observação</option>
            <option onclick="select('input_busca_categoria')">Categoria</option> 
            <option onclick="select('input_busca_enviado_para_sibi')">Enviado para SIBI</option>
            <option onclick="select('input_busca_normalizado')">Normalizado</option>
        </select>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm input-group">
                <input type="text" class="form-control" name="search" type="text" value="{{ request()->search }}" >
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm input-group" id="query-select-group">
                <span><b>Categoria</b></span>
                <select class="form-select" id="input_busca_categoria" name="busca_categoria" disabled>
                    <option value="Assunto">Assunto</option>
                    <option value="Coleção">Coleção</option>
                    <option value="Autor">Autor</option>
                </select>
            </div>
            <div class="col-sm input-group" id="query-select-group">
                <span><b>Enviado para Sibi</b></span>
                <select class="form-select" id="input_busca_enviado_para_sibi" name="busca_enviado_para_sibi" disabled>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="col-sm input-group" id="query-select-group">
                <span><b>Normalizado</b></span>
                <select class="form-select" id="input_busca_normalizado" name="busca_normalizado" disabled>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
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
