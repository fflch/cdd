@extends('main')
@section('content')
<div class="container-fluid">
  <a class="btn btn-outline-dark" href="/" role="button">
        <i class="fas fa-arrow-left"></i> Voltar
  </a>
  <table class="table text-justify bg-light">
    @include('termo.partials.fields')
  </table>
</div>
@endsection  