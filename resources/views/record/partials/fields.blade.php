<table class="table text-justify bg-light">
    <thead class="thead border-info">
        <tr class="table alert alert-secondary border-info">
            <th scope="col">
                <div class="record_header">
                    <div class="text-uppercase">{{  $record->assunto ?? ''  }}</div>
                    <form action="/records/{{  $record->id  }}" method="POST">
                        <a class="btn btn-outline-success" href="/records/{{  $record->id  }}/edit" role="button">Editar</a>
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Tem certeza?');">Apagar</button> 
                    </form>
                </div>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="font-weight-bold">Enviado para SIBI:</div>
                @if ($record->enviado_para_sibi == 1)
                    Sim
                @else
                    Não
                @endif
            </td>      
        </tr>
        <tr>
            <td>
                <div class="font-weight-bold">Normalizado:</div>
                @if ($record->normalizado == 1)
                    Sim
                @else
                    Não
                @endif
            </td>      
        </tr>
        <tr>
            <td><div class="font-weight-bold">Observação:</div>{{  $record->observacao ?? ''  }}</td>      
        </tr>
        <tr>
            <td><div class="font-weight-bold">Classificação:</div>{{  $record->classificacao ?? ''  }}</td>      
        </tr>
        <tr>
            <td><div class="font-weight-bold">Categoria:</div>{{  $record->categoria ?? ''  }}</td>      
        </tr>
        <tr>
            <td>
                <div class="font-weight-bold">Remissivas:</div>
                <ul>
                    @forelse($record->remissivas as $remissiva)
                        <li>{{ $remissiva->texto }}</li>
                    @empty
                        <span>Ainda não há remissivas cadastradas.</span>
                    @endforelse
                </ul>
            </td>      
        </tr>
    </div>
    </tbody>
</table>