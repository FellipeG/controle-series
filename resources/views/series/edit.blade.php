@extends('base')

@section('content')
    <h1>Atualizar série</h1>
    <form method="post" action="{{ route('series.update', $series) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome da série:</label>
            <input name="name" type="text" id="name" value="{{ $series->nome }}" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
@endsection
