@extends('main')

@section('content')
<div class="container-fluid">
    <form method="get" action="/termos">
        @include('termo.partials.search')
    </form><br>
        @forelse($termos as $termo)
        @include('termo.partials.fields')
        @empty
            <p>Não há registros cadastrados ainda.</p>
        @endforelse
        
</div>
@endsection