@extends('main')

@section('title')
    Índice CDD
@endsection

@section('content')
    @forelse($cdds as $cdd)
    @include('cdd.partials.fields')
    @empty
        <p>Não há CDDs cadastrados ainda.</p>
    @endforelse
@endsection