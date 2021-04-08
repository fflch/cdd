@foreach($termo->cdds as $cdd)
{{ $cdd->cdd }} <br>
@endforeach

<form method="POST" action="/termos/addcdd/{{$termo->id}}">
    @csrf
    CDD:
    <select class="cdd" name="cdd">
        @foreach(App\Models\Cdd::all() as $cdd)
            <option value="{{ $cdd->id }}">{{$cdd->cdd}}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-outline-success">Adicionar CDD</button>

</form>

<br>

@section('javascripts_bottom')
<script>

$(document).ready(function() {
    $('.cdd').select2();
});

</script>
@endsection