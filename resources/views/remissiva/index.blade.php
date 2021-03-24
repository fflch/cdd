@extends('main')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <span><b>Busca</b></span>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm input-group">
                    <input type="text" class="form-control" id="input_busca_texto" name="busca_texto" type="text" placeholder="Remissiva" value="{{ request()->busca_texto }}">
                </div>
                <div class="row">
                    <div class="col-sm input-group">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-success">Buscar</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <b>Índice de remissivas</b>
        </div>
        <div class="card-body">
            @forelse($remissivas as $remissiva)
            @include('remissiva.partials.fields')
            <br>
            @empty
                <p>Não há remissivas cadastradas ainda.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection