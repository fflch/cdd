@extends('main')

@section('content')
<div class="container-fluid">
<form class="form-inline" action="{{ route('termo.searchcdd') }}">
  <div class="form-group mx-sm-3 mb-2">
    <label>CDD</label>
    <input type="text" class="form-control" name="search" value="{{ $search ?? "" }}">
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
