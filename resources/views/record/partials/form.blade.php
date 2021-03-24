<div class="card">
    <div class="card-header">
        <b>{{ $param ?? '' }}</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm form-group">  
                <b>Assunto</b>
                <br>
                <input class="form-control" type="text" name="assunto" value="{{  old('assunto', $record->assunto) }}" >
            </div>
        </div>
        <div class="row">
            <div class="col-sm form-group">  
                <b>Enviado para SIBI</b>
                <br>
                <input type="radio" name="enviado_para_sibi" value="1" @if (isset($record->enviado_para_sibi) and ($record->enviado_para_sibi === 1))
                                checked
                            @elseif ((old('enviado_para_sibi') != null) and (old('fixarip') == 1))
                                checked
                @endif>Sim<br>

                <input type="radio" name="enviado_para_sibi" value="0" @if (isset($record->enviado_para_sibi) and ($record->enviado_para_sibi === 0))
                                checked
                            @elseif ((old('enviado_para_sibi') != null) and (old('fixarip') == 0))
                                checked
                @endif>Não<br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm form-group">  
                <b>Normalizado</b>
                <br>
                <input type="radio" name="normalizado" value="1" @if (isset($record->normalizado) and ($record->normalizado === 1))
                                checked
                            @elseif ((old('normalizado') != null) and (old('fixarip') == 1))
                                checked
                @endif>Sim<br>
                <input type="radio" name="normalizado" value="0" @if (isset($record->normalizado) and ($record->normalizado === 0))
                                checked
                            @elseif ((old('normalizado') != null) and (old('fixarip') == 0))
                                checked
                @endif>Não<br>            
            </div>
        </div>
        <div class="row">
            <div class="col-sm form-group">  
                <b>Classificação</b>
                <br>
                <input class="form-control" type="text" name="classificacao" value="{{  old('classificacao', $record->classificacao) }}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm form-group">  
                <b>Categoria</b>
                <br>
                <select class="form-control" name="categoria">
                    <option value="" selected="">Selecione uma opção </option>
                    @foreach($record::categorias() as $categoria)
                        @if (old('categoria') == '')
                        <option value="{{ $categoria }}" {{ ($record->categoria == $categoria) ? 'selected':'' }}>
                            {{ $categoria }}
                        </option>
                        @else
                        <option value="{{ $categoria }}" {{ (old('categoria') == $categoria) ? 'selected' : '' }}>
                            {{ $categoria }}
                        </option>
                        @endif
                    @endforeach
                </select>            
            </div>
        </div>
        <div class="row">
            <div class="col-sm form-group">  
                <b>Observação</b>
                <br>
                <textarea class="form-control" name="observacao" value="{{  old('observacao', $record->observacao) }}"></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-outline-success">Enviar</button>
        <a class="btn btn-outline-dark" href="/" role="button">
            <i class="fas fa-arrow-left"></i> Voltar
        </a>
    </div>
</div>