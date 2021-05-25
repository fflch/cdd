@forelse($termo->cdds as $cdd)
    <li class="list-group-item">
        {{ $cdd->cdd }}
        @can('admin')     
        <form method="POST" action="/termos/removecdd/{{ $termo->id }}/{{ $cdd->id }}">
            @csrf 
            @method('delete')
            <br>
            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Tem certeza?');">Apagar</button> 
        </form>
        @endcan
    </li>
@empty
    <span>Ainda não há CDDs cadastrados.</span>
@endforelse