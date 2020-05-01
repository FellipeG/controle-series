@extends('base')

@section('content')
    <h1>Séries</h1>

    @include('includes.mensagem', ['mensagem' => $mensagem])

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @auth
                    <a href="{{ route('series.edit', $serie) }}">{{ $serie->nome }}</a>
                @endauth

                @guest
                    {{ $serie->nome }}
                @endguest
                <span class="d-flex">
                    <a href="{{ route('temporadas.index', $serie) }}" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    @auth
                        <form method="post" action="{{ route('series.destroy', $serie) }}"
                        onsubmit='return confirm("Tem certeza que deseja deletar a série: {{ addslashes($serie->nome) }}")'>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    @endauth
                </span>
            </li>
        @endforeach
    </ul>
    @auth
        <a class="btn btn-primary mt-3" href="{{ route('series.create') }}">Adicionar</a>
    @endauth
@endsection

