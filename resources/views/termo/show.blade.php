@extends('main')
@section('content')
<div class="container-fluid">
  <a class="btn btn-outline-dark" href="/" role="button" id="return-button">
        <i class="fas fa-arrow-left"></i> Voltar
  </a>
  <div class="card">
    <div class="card-body">
      <table class="table text-justify bg-light">
        @include('termo.partials.table-row-headers')
        @include('termo.partials.fields')
      </table>
      
      @can('admin')
        <form action="/termos/{{  $termo->id  }}" method="POST">
            <a class="btn btn-outline-success" href="/termos/{{  $termo->id  }}/edit" role="button">Editar</a>
            @csrf
            @method('delete')
            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Tem certeza?');">Apagar</button> 
        </form>
        @endcan
    </div>
  </div>
</div>
@endsection  