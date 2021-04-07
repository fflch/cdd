<form method="POST" action="/cdd">
    @csrf
    CDD:
    <select class="js-example-basic-single" name="state">
        <option value="AL">Alabama</option>
        <option value="WY">Wyoming</option>
    </select>
    <button type="submit" class="btn btn-outline-success">Adicionar remissiva</button>
</form>