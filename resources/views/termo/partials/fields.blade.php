<tr>
    <td>
        @can('admins')
            <a href="/termos/{{ $termo->id }}/edit">{{  $termo->assunto ?? ''  }}</a>
        @else
            {{  $termo->assunto ?? ''  }}
        @endcan
    </td>
    <td>
        <ul class="list-group">
            @include('termo.partials.remissiva-show')
        </ul>
    </td>
    <td>
        <ul class="list-group">
            @include('termo.partials.cdd-show')
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