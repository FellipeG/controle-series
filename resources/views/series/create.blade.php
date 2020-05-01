@extends('base')

@section('content')
    <h1>Criar série</h1>
    <form method="post" action="{{ route('series.store') }}">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="name">Nome da Série:</label>
                <input name="name" type="text" id="name" class="form-control" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col col-2">
                <label for="qtd_temporadas">N. de Temporadas:</label>
                <input name="qtd_temporadas" type="number" id="qtd_temporadas" class="form-control" />
                @error('qtd_temporadas')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col col-2">
                <label for="ep_por_temporada">Ep. por Temporada:</label>
                <input name="ep_por_temporada" type="number" id="ep_por_temporada" class="form-control" />
                @error('ep_por_temporada')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Criar</button>
    </form>
@endsection
