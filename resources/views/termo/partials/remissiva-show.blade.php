@foreach($termo->remissivas as $remissiva)
    <li class="list-group-item" id="space-between">
        {{ $remissiva->titulo }}
    </li>
@endforeach
