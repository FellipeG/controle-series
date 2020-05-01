<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        return view('episodios.index', [
            'temporada' => $temporada,
            'episodios' => $temporada->episodios,
            'mensagem' => $request->session()->get('mensagem')
        ]);
    }

    public function update(Request $request, Temporada $temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio) use ($request) {
            $episodio->assistido = in_array($episodio->id, $request->episodios);
        });

        $temporada->push();

        $request->session()->flash('mensagem',
            "Os episódios da série {$temporada->serie->nome} foram marcados como assistido com sucesso!");

        return redirect()->route('episodios.index', $temporada);
    }
}
