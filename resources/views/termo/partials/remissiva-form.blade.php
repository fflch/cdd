@foreach($termo->remissivas as $remissiva)
    <input name="remissivas[]" value="{{ $remissiva->titulo }}"> <br>
@endforeach

@for ($i = 0; $i < 5; $i++)
    <input name="remissivas[]" value=""> <br>
@endfor