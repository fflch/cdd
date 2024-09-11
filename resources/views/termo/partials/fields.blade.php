<tr>
  <td>
    @can('admin')
      <a href="/termos/{{ $termo->id }}/edit">{{  $termo->assunto ?? ''  }}</a>
    @else
      {{  $termo->assunto ?? ''  }}
    @endcan
  </td>
  <td>
    @foreach($termo->cdds as $cdd)
      <span class="d-block">
        {{ $cdd->cdd }}
      </span>
    @endforeach
  </td>
  <td>
    @foreach($termo->remissivas as $remissiva)
    <span class="d-block">
      {{ $remissiva->titulo }}
    </span>
    @endforeach
  </td>
  <td>{{  $termo->categoria ?? ''  }}</td>
  <td>{{  $termo->observacao ?? ''  }}</td>
  <td class="text-center">
    @can('admin')
    <a href="/termos/{{ $termo->id }}" class="delete-item btn text-danger"><i class="fas fa-trash-alt"></i></a>
    @endcan
  </td>
</tr>
