<div class="card-body">
    <ul class="list-group list-group-flush">
        <li class="list-group-item" ><h5>Assunto</h5><a href="/records/{{$record->id}}">{{  $record->assunto ?? ''  }}</a></li>
        <li class="list-group-item" ><h5>ID</h5>{{  $record->id ?? ''  }}</li>
        <li class="list-group-item"><h5>Enviado para SIBI</h5>
        @if ($record->enviado_para_sibi == 1)
            Sim
        @else
            Não
        @endif
        <!-- {{  $record->enviado_para_sibi ?? ''  }} -->
        </li>
        <li class="list-group-item isbn"><h5>Normalizado</h5>
        @if ($record->normalizado == 1)
            Sim
        @else
            Não
        @endif
        <!-- {{  $record->normalizado ?? ''  }} -->
        </li>
        <li class="list-group-item"><h5>Observação</h5>{{  $record->observacao ?? ''  }}</li>
        <li class="list-group-item"><h5>Classificação</h5>{{  $record->classificacao ?? ''  }}</li>
        <li class="list-group-item"><h5>Categoria</h5>{{  $record->categoria ?? ''  }}</li>
    </ul>
    </br>
    <div class="col-sm form-group">
        <form action="/records/{{  $record->id  }}" method="POST">
            <a class="btn btn-outline-success" href="/records/{{  $record->id  }}/edit" role="button">Editar</a>
            @csrf
            @method('delete')
            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Tem certeza?');">Apagar</button> 
        </form>
    </div>
</div>