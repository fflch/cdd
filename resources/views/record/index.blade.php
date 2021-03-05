@extends('main')

@section('content')
<div class="container-fluid">
    <form method="get" action="/records">
        @include('record.partials.search')
    </form><br>
    
    <table class="table text-justify bg-light">
        @forelse($records as $record)
        @include('record.partials.fields')
        @empty
            <p>Não há artigos cadastrados ainda.</p>
        @endforelse
    </table>
</div>
@endsection