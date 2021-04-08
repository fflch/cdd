<table class="table text-justify bg-light">
    <thead class="thead border-info">
        <tr class="table alert alert-secondary border-info">
            <th scope="col">
                <div class="termo_header">
                    <div class="text-uppercase">{{  $termo->assunto ?? ''  }}</div>
                    <form action="/termos/{{  $termo->id  }}" method="POST">
                        <a class="btn btn-outline-success" href="/termos/{{  $termo->id  }}/edit" role="button">Editar</a>
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
                @if ($termo->enviado_para_sibi == 1)
                    Sim
                @else
                    Não
                @endif
            </td>      
        </tr>
        <tr>
            <td>
                <div class="font-weight-bold">Normalizado:</div>
                @if ($termo->normalizado == 1)
                    Sim
                @else
                    Não
                @endif
            </td>      
        </tr>
        <tr>
            <td><div class="font-weight-bold">Observação:</div>{{  $termo->observacao ?? ''  }}</td>      
        </tr>
        <tr>
            <td><div class="font-weight-bold">Classificação:</div>{{  $termo->classificacao ?? ''  }}</td>      
        </tr>
        <tr>
            <td><div class="font-weight-bold">Categoria:</div>{{  $termo->categoria ?? ''  }}</td>      
        </tr>
        <tr>
            <td>
                <div class="font-weight-bold">Remissivas:</div>
                <br>
                <ul class="list-group">
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
                </ul>
                <br>
                <div class="font-weight-bold">Adicionar remissiva</div>
                @include('termo.partials.remissiva')

            </td>      
        </tr>
    </div>
    </tbody>
</table>

<br>