@extends('main')
@section('content')
    <form method="POST" action="/remissivas">
        @csrf
        @include('remissiva.partials.form')
    </form>
@endsection