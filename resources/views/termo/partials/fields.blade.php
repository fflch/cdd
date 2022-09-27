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
            @include('termo.partials.cdd-show')
        </ul>
    </td>
    <td>
        <ul class="list-group">
            @include('termo.partials.remissiva-show')
        </ul>
    </td>
    <td>{{  $termo->categoria ?? ''  }}</td>
    <td>{{  $termo->observacao ?? ''  }}</td>
    <td>
    @can('admins')
        <form action="/termos/{{  $termo->id  }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="delete-item btn" onclick="return confirm('Tem certeza que deseja excluir?');"><i class="fas fa-trash-alt"></i></button>
        </form>
      @endcan
    </td>
</tr>