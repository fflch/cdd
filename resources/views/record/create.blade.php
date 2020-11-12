@extends('laravel-usp-theme::master')
@section('content')
    <form method="POST" action="/records">
        @csrf
        @include('record.partials.form')
    </form>
@endsection