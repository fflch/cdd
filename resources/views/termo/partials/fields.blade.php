<table class="table text-justify bg-light">
    <thead class="thead border-info">
        <tr class="table alert alert-secondary border-info">
            <th scope="col">
                <div class="termo_header">
                    <div class="text-uppercase">{{  $termo->assunto ?? ''  }}</div>
                    @can('admin')
                    <form action="/termos/{{  $termo->id  }}" method="POST">
                        <a class="btn btn-outline-success" href="/termos/{{  $termo->id  }}/edit" role="button">Editar</a>
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Tem certeza?');">Apagar</button> 
                    </form>
                    @endcan
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
            <td><div class="font-weight-bold">Categoria:</div>{{  $termo->categoria ?? ''  }}</td>      
        </tr>
        <tr>
            <td>
                <div class="font-weight-bold">Remissivas:</div>
                <br>
                <ul class="list-group">
                    @include('termo.partials.remissiva-show')
                </ul>
                <br>
                @can('admin')
                    <div class="font-weight-bold">Adicionar remissiva</div>
                    @include('termo.partials.remissiva-form')
                @endcan
            </td>      
        </tr>
        <tr>
            <td>
                <div class="font-weight-bold">CDD:</div>
                <br>
                <ul class="list-group">
                    @include('termo.partials.cdd-show')
                </ul>
                @can('admin')
                <br>
                <div class="font-weight-bold">Adicionar CDD</div>
                <br>
                @include('termo.partials.cdd-form')
                @endcan
            </td>      
        </tr>
    </tbody>
</table>