@extends('main')
@section('content')
  <form method="POST" action="/termos/{{ $termo->id }}">
    @csrf
    @method('patch')

    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm form-group">
              <b>Termo</b> <br>
              <input class="form-control" type="text" name="assunto" value="{{  old('assunto', $termo->assunto) }}" >
          </div>
        </div>

        <div class="row">
          <div id="container_cdd" class="col-sm form-group">
            <b>CDDs</b><br>
            @if(count($termo->cdds) === 0)
            <div id="cdd0" class="cdd">
              <input type="text" name="cdds[]" value=""><button class="btn btn-primary ml-2 btn-sm">+</button>
            </div>
            @else
              @foreach($termo->cdds as $cdd)
              <div id="cdd{{ $loop->index }}" class="cdd">
                <input type="text" name="cdds[]" value="{{ $cdd->cdd }}">@if($loop->index == 0)<button class="btn btn-primary ml-2 btn-sm">+</button>@else<button class="btn btn-danger ml-2 btn-sm">-</button>@endif
              </div>
              @endforeach
            @endif
          </div>
        </div>

        <div class="row">
          <div id="container_remissiva" class="col-sm form-group">
            <b>Remissivas</b><br>
            @if(count($termo->remissivas) === 0)
            <div id="remissiva0" class="remissiva">
              <input type="text" name="remissivas[]" value=""><button class="btn btn-primary ml-2 btn-sm">+</button>
            </div>
            @else
              @foreach($termo->remissivas as $remissiva)
              <div id="remissiva{{ $loop->index }}" class="remissiva">
                <input type="text" name="remissivas[]" value="{{ $remissiva->titulo }}">@if($loop->index == 0)<button class="btn btn-primary ml-2 btn-sm">+</button>@else<button class="btn btn-danger ml-2 btn-sm">-</button>@endif
              </div>
              @endforeach
            @endif
          </div>
        </div>

        <div class="row">
          <div class="col-sm form-group">
            <b>Categoria</b><br>
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
        </div>
        <div class="row">
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
        </div>

        <button type="submit" class="btn btn-success" onclick="{{$termo->updated_at}}">Salvar</button>
      </div>
    </div>

  </form>
  <div class = "card">
    <div class = "card-body">
      <b>Data de Criação: </b>{{  old('created_at', $termo->created_at) }}<br>
      <br><b>Alterações no termo</b>
      @include('partials.audit.index', ['model' => $termo])
    </div>
  </div>
@endsection

@section('javascripts_bottom')
<script>
  $(document).ready( function () {

    $("#container_cdd").on("click", ".btn-primary", function(e){
      e.preventDefault();
      var total_cdd = $("input[name^='cdds']").length;
      if(total_cdd < 6) {
        $(".cdd:last").after('<div id="cdd' + total_cdd +'" class="cdd"></div>');
        $("#cdd" + total_cdd).append('<input type="text" name="cdds[]"><button class="btn btn-danger ml-2 btn-sm">-</button>');
      }
    });

    $("#container_cdd").on("click", ".btn-danger", function(e){
      e.preventDefault();
      $(this).closest("div").remove();
      $("div[id^='cdd']").each(function(index, value) {
        $(this).attr("id","cdd" + index);
      });
    });

    $("#container_remissiva").on("click", ".btn-primary", function(e){
      e.preventDefault();
      var total_remissiva = $("input[name^='remissivas']").length;
      if(total_remissiva < 6) {
        $(".remissiva:last").after('<div id="remissiva' + total_remissiva +'" class="remissiva"></div>');
        $("#remissiva" + total_remissiva).append('<input type="text" name="remissivas[]"><button class="btn btn-danger ml-2 btn-sm">-</button>');
      }
    });

    $("#container_remissiva").on("click", ".btn-danger", function(e){
      e.preventDefault();
      $(this).closest("div").remove();
      $("div[id^='remissiva']").each(function(index, value) {
        $(this).attr("id","remissiva" + index);
      });
    });

  });
  </script>
@stop
