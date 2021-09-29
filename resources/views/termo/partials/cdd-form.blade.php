@foreach($termo->cdds as $cdd)
    <input name="cdds[]" value="{{ $cdd->cdd }}"> <br>
@endforeach

@for ($i = 0; $i < 5; $i++)
    <input name="cdds[]" value=""> <br>
@endfor

