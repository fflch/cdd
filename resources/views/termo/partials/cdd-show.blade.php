@forelse($termo->cdds as $cdd)
    <li class="list-group-item" id="remissiva-list">
        {{ $cdd->cdd }}     
        <form method="POST" action="/termos/removecdd/{{ $termo->id }}/{{ $cdd->id }}">
            @csrf 
            @method('delete')
            <button type="submit" class="btn btn-outline-danger btn-sm">Apagar</button>
        </form>
    </li>
@empty
    <span>Ainda não há CDDs cadastrados.</span>
@endforelse