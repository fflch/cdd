@extends('main')
@section('content')
  <form method="POST" action="/cdd/{{ $cdd->id }}">
    @csrf
    @method('patch')
    @include('cdd.partials.form')
  </form>
@endsection