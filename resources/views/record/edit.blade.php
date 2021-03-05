@extends('main')
@section('content')
  <form method="POST" action="/records/{{ $record->id }}">
    @csrf
    @method('patch')
    @include('record.partials.form',['param' => 'Editar'])
  </form>
@endsection