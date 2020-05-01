@extends('base')

@section('content')
    <h1>{{ $series->nome }}</h1>
    <ul class="list-group">
        @foreach($series->temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
               <a href="{{ route('episodios.index', $temporada) }}">
                   Temporada {{ $temporada->numero }}
               </a>
                <span class="badge badge-secondary">
                    {{ $temporada->getEpisodiosAssistidos()->count() }} / {{ $temporada->episodios->count() }}
                </span>
            </li>
        @endforeach
    </ul>
@endsection
