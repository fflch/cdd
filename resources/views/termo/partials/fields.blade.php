<tr>
    <td>
        @can('admin')
            <a href="/termos/{{ $termo->id }}">{{  $termo->assunto ?? ''  }}</a>
        @else
            {{  $termo->assunto ?? ''  }}
        @endcan
    </td>
    <td>
        <ul class="list-group">
            @include('termo.partials.remissiva-show')
            @can('admin')
            <div class="card" id="card-form">
                <div class="card-header">
                    <div class="font-weight-bold">Adicionar remissiva</div>
                </div>
                @include('termo.partials.remissiva-form')
            </div>
            @endcan
        </ul>
    </td>
    <td>
        <ul class="list-group">
            @include('termo.partials.cdd-show')
            @can('admin')
            <div class="card" id="card-form">
                <div class="card-header">
                    <div class="font-weight-bold">Adicionar CDD</div>
                </div>
                @include('termo.partials.cdd-form')
            </div>
            @endcan
        </ul>
    </td>
    <td>{{  $termo->categoria ?? ''  }}</td>
    <td>@if ($termo->enviado_para_sibi == 1)
            Sim
        @else
            Não
        @endif</td>
    <td>@if ($termo->normalizado == 1)
            Sim
        @else
            Não
        @endif</td>
    <td>{{  $termo->observacao ?? ''  }}</td>
</tr>