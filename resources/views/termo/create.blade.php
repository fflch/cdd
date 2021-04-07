@extends('main')
@section('content')
    <form method="POST" action="/termos">
        @csrf
        @include('termo.partials.form',['param' => 'Cadastrar novo'])
    </form>
@endsection