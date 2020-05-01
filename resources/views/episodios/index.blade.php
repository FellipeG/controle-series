@extends('base')

@section('content')
    <h1>Episódios</h1>

    @include('includes.mensagem', ['mensagem' => $mensagem])

    <form action="{{ route('episodios.update', $temporada) }}" method="post">
        @csrf
        @method('PUT')
        <ul class="list-group">
            @foreach($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episodio->numero }}

                    <input
                        type="checkbox"
                        name="episodios[]"
                        value="{{ $episodio->id }}"
                        @if ($episodio->assistido) checked @endif />

                </li>
            @endforeach
        </ul>
        @auth
            <button class="btn btn-primary mt-2 mb-2">Salvar</button>
        @endauth
    </form>

@endsection
