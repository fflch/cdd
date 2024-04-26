@extends('main')

@section('content')
<div class="container-fluid">
  <form method="get" action="{{ route('termo.search') }}">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label>Termo</label>
      <input type="text" class="form-control" name="search" type="text" value="@isset($search){{ $search }}@endisset">
    </div>
    <div class="form-group col-md-1">
      <label>Categoria</label>
        <select name="categoria" class="form-control">
            <option selected value="">Selecione</option>
            <option value="Assunto" @if( request()->categoria == "Assunto") selected @endif>Assunto</option>
            <option value="Coleção" @if( request()->categoria == "Coleção") selected @endif>Coleção</option>
            <option value="Autor" @if( request()->categoria == "Autor") selected @endif>Autor</option>
        </select>
    </div>
    <div class="form-group col-md-1">
       <label>Enviado para Sibi</label>
       <select name="enviado_para_sibi" class="form-control">
         <option selected value="">Selecione</option>
         <option value="0" @if( request()->enviado_para_sibi == "0") selected @endif>Não</option>
         <option value="1" @if( request()->enviado_para_sibi == "1") selected @endif>Sim</option>
       </select>
    </div>
    <div class="form-group col-md-1">
      <label>Normalizado</label>
        <select name="normalizado" class="form-control">
          <option selected value="">Selecione</option>
          <option value="0"  @if( request()->normalizado == "0") selected @endif>Não</option>
          <option value="1"  @if( request()->normalizado == "1") selected @endif>Sim</option>
        </select>
    </div>
  </div>
  <button type="submit" class="btn btn-success">Buscar</button>
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
