@extends('main')
@section('content')
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Termo</th>
            <th scope="col">Número CDD</th>
            <th scope="col">Remissiva(s)</th>
            <th scope="col">Categoria</th>
            <th scope="col">Observação</th>
            <th scope="col" class="text-center">Deletar</th>
          </tr>
        </thead>
        <tr>
          <td>
            {{  $termo->assunto ?? ''  }}</a>
          </td>
          <td>
            @foreach($termo->cdds as $cdd)
              <span class="d-block">
                    {{ $cdd->cdd }}
              </span>
            @endforeach
          </td>
          <td>
            @foreach($termo->remissivas as $remissiva)
            <span class="d-block">
                    {{ $remissiva->titulo }}
            </span>
            @endforeach
          </td>
          <td>{{  $termo->categoria ?? ''  }}</td>
          <td>{{  $termo->observacao ?? ''  }}</td>
          <td class="text-center">
            @can('admin')
            <form action="/termos/{{  $termo->id  }}" method="POST">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" >Confirmar Exclusão</button>
            </form>
            @endcan
          </td>
        </tr>
      </table>
    </div>
  </div>
  <a href="{{ URL::previous() }}" class="btn btn-success mt-2" role="button">Voltar</a>
</div>
@endsection
