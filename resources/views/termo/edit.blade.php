@extends('main')
@section('content')
  <form method="POST" action="/termos/{{ $termo->id }}">
    @csrf
    @method('patch')
    @include('termo.partials.form',['param' => 'Editar'])
  </form>
@endsection