@extends('main')
@section('content')
    <form method="POST" action="/cdd">
        @csrf
        @include('cdd.partials.form')
    </form>
@endsection