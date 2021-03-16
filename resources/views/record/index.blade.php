@extends('main')

@section('content')
<div class="container-fluid">
    <form method="get" action="/records">
        @include('record.partials.search')
    </form><br>
        @forelse($records as $record)
        @include('record.partials.fields')
        @empty
            <p>Não há artigos cadastrados ainda.</p>
        @endforelse
</div>
@endsection