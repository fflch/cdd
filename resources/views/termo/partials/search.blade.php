<div class="card">

    <div class="card-body">
        <div class="row">
            <div class="col-sm input-group" id="query-select-group">
                <span class="input-group-btn"><b>Categoria</b></span><br>
                <select name="categoria" class="btn btn-success mr-2">
                    <option selected value="">--Selecione--</option>
                    <option value="Assunto" @if( request()->categoria == "Assunto") selected @endif>Assunto</option>
                    <option value="Coleção" @if( request()->categoria == "Coleção") selected @endif>Coleção</option>
                    <option value="Autor" @if( request()->categoria == "Autor") selected @endif>Autor</option>
                </select>
            </div>
            <div class="col-sm input-group" id="query-select-group">
                <span><b>Enviado para Sibi</b></span><br>
                <select name="enviado_para_sibi" class="btn btn-success mr-2">
                    <option selected value="">--Selecione--</option>
                    <option value="1" @if( request()->enviado_para_sibi == "1") selected @endif>Sim</option>
                    <option value="0" @if( request()->enviado_para_sibi == "0") selected @endif>Não</option>
                </select>
            </div>
            <div class="col-sm input-group" id="query-select-group">
                <span><b>Normalizado</b></span><br>
                <select name="normalizado" class="btn btn-success mr-2">
                    <option selected value="">--Selecione--</option>
                    <option value="1"  @if( request()->normalizado == "1") selected @endif>Sim</option>
                    <option value="0"  @if( request()->normalizado == "0") selected @endif>Não</option>
                </select>
            </div>

        </div>
        <br>
        <div class="row">
                <div class="col-sm input-group">
                        <input type="text" class="form-control" name="search" type="text">
                        <span class="input-group-btn">
                        </span>
                        <select name="campos" class="btn btn-success mr-2">
                        <option value="" selected="">Selecione um campo</option>

                        @foreach($campos as $chave=>$valor)
                            @if(Request()->campos != null)
                            <option value = "{{$chave}}" {{ (Request()->campos
                            == $chave) ? 'selected' : '' }}>{{ $valor }}
                            @else
                            <option value = "{{$chave}}">{{ $valor }}
                            @endif
                            </option>
                        @endforeach
                        </select>
                    <br>
                </div>
        </div><br>
        <button type="submit" class="btn btn-success">Buscar</button>

</div>
