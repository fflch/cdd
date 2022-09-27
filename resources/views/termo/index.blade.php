@extends('main')

@section('content')
<div class="container-fluid">
    <form method="get" action="/termos">
        @include('termo.partials.search')
    </form><br>
    <table class="table table-bordered">
        <tbody>
            @include('termo.partials.table-row-headers')
            @forelse($termos as $termo)
                @include('termo.partials.fields')
            @empty
                <p>Não há registros cadastrados.</p>
            @endforelse
        </tbody>
    </table>
    {{ $termos->appends(request()->query())->links() }}
</div>
@endsection
