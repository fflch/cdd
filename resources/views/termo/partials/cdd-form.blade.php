<form method="POST" action="/termos/addcdd/{{$termo->id}}">
    @csrf
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
            <select class="cdd" name="cdd">
                <option value="" selected>--Digite um CDD--</option>
                @foreach(App\Models\Cdd::all() as $cdd)
                    <option value="{{ $cdd->id }}">{{$cdd->cdd}}</option>
                @endforeach
            </select>
            <br>
            <button type="submit" class="btn btn-outline-success btn-sm">Adicionar CDD</button>
        </li>
    </ul>
</form>

@section('javascripts_bottom')
<script>

$(document).ready(function() {
    $('.cdd').select2();
});

</script>
@endsection