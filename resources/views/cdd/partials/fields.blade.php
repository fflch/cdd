<div class="card">
    <div class="card-header">
    <b>{{ $cdd->cdd }}</b>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item" ><h6>CDD</h6><a href="/cdd/{{$cdd->id}}">{{  $cdd->cdd ?? ''  }}</a></li>  
        </ul>
        @can('admin')
        </br>
        <div class="col-sm form-group">
            <form action="/cdd/{{  $cdd->id  }}" method="POST">
                <a class="btn btn-success" href="/cdd/{{  $cdd->id  }}/edit" role="button">Editar</a>
                @csrf
                @method('delete')
                <button class="btn btn-danger" type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>  
            </form>
        </div>
        @endcan
    </div>
</div>
<br>