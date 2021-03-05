<div class="row">
    <div class="col-sm input-group">
        <div class="d-grid gap-2 d-md-block">
            <span><b>Busca por</b></span>
            <select class="form-select" aria-label="Default select example">
                <option selected>--Selecione--</option>
                <option onclick="select('input_busca_assunto')">Assunto</option>
                <option onclick="select('input_busca_cdd')">CDD</option>
                <option onclick="select('input_busca_remissiva')">Remissiva</option>
                <option onclick="select('input_busca_observacao')">Observação</option>
                <option onclick="select('input_busca_categoria')">Categoria</option> 
                <option onclick="select('input_busca_enviado_para_sibi')">Enviado para SIBI</option>
                <option onclick="select('input_busca_normalizado')">Normalizado</option>
            </select>
        </div>
    </div>
</div><br>
<div class="row">
    <div class="col-sm input-group">
        <input type="text" class="form-control" id="input_busca_assunto" name="busca_assunto" type="text" placeholder="Assunto" value="{{ request()->busca_assunto }}" disabled>
        <input type="text" class="form-control" id="input_busca_cdd" name="busca_cdd" type="text" placeholder="CDD" value="{{ request()->busca_cdd }}" disabled>
        <input type="text" class="form-control" id="input_busca_remissiva" name="busca_remissiva" type="text" placeholder="Remissiva" value="{{ request()->busca_remissiva }}" disabled>
        <input type="text" class="form-control" id="input_busca_observacao" name="busca_observacao" type="text" placeholder="Observação" value="{{ request()->busca_observacao }}" disabled>
        <input type="text" class="form-control" id="input_busca_categoria" name="busca_categoria" type="text" placeholder="Categoria" value="{{ request()->busca_categoria }}" disabled>
        <input type="text" class="form-control" id="input_busca_enviado_para_sibi" name="busca_enviado_para_sibi" type="text" placeholder="Enviado para SIBI" value="{{ request()->busca_enviado_para_sibi }}" disabled>
        <input type="text" class="form-control" id="input_busca_normalizado" name="busca_normalizado" type="text" placeholder="Normalizado" value="{{ request()->busca_normalizado }}" disabled>
        <span class="input-group-btn">
            <button type="submit" class="btn btn-success"> Buscar </button>
        </span>
    </div>
</div>