<div class="card">
    <div class="card-header">
        <a href="/termos/{{ $termo->id }}">
            <i class="fas fa-chevron-circle-left"></i>
        </a>        </a>
        <b>{{ $param ?? '' }}</b>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm form-group">
                <b>Assunto</b>
                <br>
                
                <input class="form-control" type="text" name="assunto" value="{{  old('assunto', $termo->assunto) }}" >
            </div>
        </div>

        <div class="row">
            <div class="col-sm form-group">
                <b>Enviado para SIBI</b>
                <br>
                <input type="radio" name="enviado_para_sibi" value="1"
                @if (isset($termo->enviado_para_sibi) and ($termo->enviado_para_sibi === 1))
                                checked
                            @elseif ((old('enviado_para_sibi') != null) and (old('fixarip') == 1))
                                checked
                @endif> Sim
                <input type="radio" name="enviado_para_sibi" value="0"
                @if (isset($termo->enviado_para_sibi) and ($termo->enviado_para_sibi === 0))
                        checked
                    @elseif ((old('enviado_para_sibi') != null) and (old('fixarip') == 0))
                        checked
                    @endif> Não
            </div>
            <div class="col-sm form-group">
                <b>Normalizado</b>
                <br>
                <input type="radio" name="normalizado" value="1"
                    @if (isset($termo->normalizado) and ($termo->normalizado === 1))
                            checked
                        @elseif ((old('normalizado') != null) and (old('fixarip') == 1))
                            checked
                        @endif> Sim

            <input type="radio" name="normalizado" value="0"
                @if (isset($termo->normalizado) and ($termo->normalizado === 0))
                        checked
                    @elseif ((old('normalizado') != null) and (old('fixarip') == 0))
                        checked
                    @endif> Não
            </div>
            <div class="col-sm form-group">
                <b>Categoria</b>
                <br>
                <select class="form-control" name="categoria">
                    <option value="" selected="">Selecione uma opção </option>
                    @foreach($termo::categorias() as $categoria)
                        @if (old('categoria') == '')
                        <option value="{{ $categoria }}" {{ ($termo->categoria == $categoria) ? 'selected':'' }}>
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
                <input type="text" class="form-control" name="observacao" value="{{  old('observacao', $termo->observacao) }}"></textarea>
            </div>
        </div>

        <div class="row">
          <div class="col-sm form-group">
            <b>Remissivas</b><br>
            @include('termo.partials.remissiva-form')
          </div>
          <div class="col-sm form-group">
            <b>CDDs:</b><br>
            @include('termo.partials.cdd-form')
          </div>
        </div>
        <button type="submit" class="btn btn-outline-success" onclick="{{$termo->updated_at}}">Enviar</button>
    </div>
</div>
