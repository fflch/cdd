@extends('main')

@section('content')
<div class="container-fluid">
    <form method="get" action="/termos">
        @include('termo.partials.search')
    </form><br>
    {{ $termos->appends(request()->query())->links() }} 
    <table class="table table-bordered">
        <tbody>
            @include('termo.partials.table-row-headers')
            @forelse($termos as $termo)
            @include('termo.partials.fields')
            @empty
                <p>Não há registros cadastrados ainda.</p>
            @endforelse
        </tbody>
    </table>
</div>
@endsection