@forelse($termo->remissivas as $remissiva)
    <li class="list-group-item" id="remissiva-list">
        {{ $remissiva->titulo }}
        <form method="POST" action="/remissivas/{{ $remissiva->id }}">
            @csrf 
            @method('delete')
            <button type="submit" class="btn btn-outline-danger btn-sm">Apagar</button>
        </form>
    </li>
@empty
    <span>Ainda não há remissivas cadastradas.</span>
@endforelse