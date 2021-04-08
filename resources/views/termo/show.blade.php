@extends('main')
@section('content')
<div class="container-fluid">
  <table class="table text-justify bg-light">
    @include('termo.partials.fields')
    @include('termo.partials.cdd')

  </table>
  <a class="btn btn-outline-dark" href="/" role="button">
        <i class="fas fa-arrow-left"></i> Voltar
  </a>
</div>
@endsection  