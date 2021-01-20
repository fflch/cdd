Assunto:  <input type="text" name="assunto" value="{{  old('assunto', $record->assunto) }}" >
<br><br>
Enviado para SIBI:<br> 
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

<br>
Normalizado:<br>
<input type="radio" name="normalizado" value="1" @if (isset($record->normalizado) and ($record->normalizado === 1))
                checked
            @elseif ((old('normalizado') != null) and (old('fixarip') == 1))
                checked
@endif>Sim<br>
<input type="radio" name="normalizado" value="0" @if (isset($record->normalizado) and ($record->normalizado === 0))
                checked
            @elseif ((old('normalizado') != null) and (old('fixarip') == 0))
                checked
@endif
>Não<br>
<br>
Observação:   <input type="text" name="observacao" value="{{  old('observacao', $record->observacao) }}">
<br><br>
Classificação:   <input type="text" name="classificacao" value="{{  old('classificacao', $record->classificacao) }}">
<br><br>
Categoria:
<select name="categoria">
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
<br><br>
<button type="submit"> Enviar </button>

<!-- Normalizado:    <input type="text" name="normalizado" value="{{  old('normalizado', $record->normalizado) }}"> -->
<!-- Enviado para SIBI:   <input type="text" name="enviado_para_sibi" value="{{  old('enviado_para_sibi', $record->enviado_para_sibi) }}" > -->