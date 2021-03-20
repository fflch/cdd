@extends('main')
@section('content')
<div class="container-fluid">
  <table class="table text-justify bg-light">
    @include('remissiva.partials.fields')
  </table>
  <a class="btn btn-outline-dark" href="/remissivas" role="button">
        <i class="fas fa-arrow-left"></i> Voltar
  </a>
</div>
@endsection  