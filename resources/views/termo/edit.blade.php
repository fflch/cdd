@extends('main')
@section('content')
  <form method="POST" action="/termos/{{ $termo->id }}">
    @csrf
    @method('patch')
    @include('termo.partials.form')
  </form>
  <div class = "card">
    <div class = "card-body">
      <b>Data de Criação: </b>{{  old('created_at', $termo->created_at) }}<br>
      <br><b>Alterações no termo</b>
      @include('partials.audit.index', ['model' => $termo])
    </div>
  </div>
@endsection
