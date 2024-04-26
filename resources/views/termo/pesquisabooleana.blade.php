@extends('main')

@section('content')
<div class="container-fluid">
<form class="form-group" action="{{ route('termo.searchbooleana') }}">
  <div id="container" class="form-group col-sm">
    @foreach(request()->campos ?? [''] as $select_campo)
      <div class="row mb-1" id="pesquisa{{ $loop->index }}">
        <select name="campos[]" class="btn btn-success mr-2">
        <option value="" selected="">Selecione um campo</option>
        @foreach($campos as $key => $valor)
          <option value = "{{ $key }}" @if($key == $select_campo) selected @endif>
              {{$valor}}
          </option>
        @endforeach
        </select>
        <input name="search[]" value="{{ request()->search[$loop->index] ?? '' }}">
        <button class="btn btn-primary float-left ml-2">+</button>
        <button class="btn btn-danger float-left ml-2">-</button>
      </div>
    @endforeach
    <div class="row mb-1" id="pesquisa{{ count(request()->campos ?? ['']) }}"></div>
  </div>
  <button type="submit" class="btn btn-success mb-2">Buscar</button>
</form><br />
<table class="table table-bordered">
  <tr class="table alert alert-secondary border-info">
    <th>Termo</th>
    <th>Número CDD</th>
    <th>Remissiva(s)</th>
    <th>Categoria</th>
    <th>Observação</th>
    <th class="text-center">Deletar</th>
  </tr>
  <tbody>
    @forelse($termos as $termo)
      @include('termo.partials.fields')
    @empty
      <p>Não há registros cadastrados.</p>
    @endforelse
  </tbody>
</table>
{{ $termos->appends(request()->query())->links() }}
</div>
@endsection

@section('javascripts_bottom')
<script>
  $(document).ready( function () {
    let row_select = $("select[name^='campos']").length;

    $("#container").on("click", ".btn-primary", function(e){
      e.preventDefault();
      if(row_select < 4) {
        let new_row_select = row_select - 1;
        $("#pesquisa" + row_select).html( $("#pesquisa" + new_row_select).html() );
        $("#container").append('<div class="row mb-1" id="pesquisa' + (row_select + 1)+ '"></div>');
        row_select++;
      }
    });

    $("#container").on("click", ".btn-danger", function(e){
      e.preventDefault();
      if(row_select > 1){
        $("#pesquisa" + (row_select - 1)).remove();
        $("#pesquisa" + row_select).attr('id', 'pesquisa' + (row_select - 1));
        row_select--;
      }
    });
    $("input[name^='search']").keypress(function (e) {
      var key = e.which;
      if(key == 13)  // the enter key code
        {
          $('#buscar').click();
          return false;
        }
    });

  });
  </script>
@stop
