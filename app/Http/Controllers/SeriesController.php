<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Helpers\SeriesHelper;
use App\Http\Requests\SeriesRequest;
use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class SeriesController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $series = Serie::orderBy('id', 'DESC')->get();
        $mensagem = $request->session()->get('mensagem');
        $delete = $request->session()->get('delete');

        return view('series.index', compact('series', 'mensagem', 'delete'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        if (!Auth::check()) {
            return redirect()->route('in.index');
        }

        return view('series.create');
    }

    /**
     * @param SeriesRequest $request
     * @param SeriesHelper $seriesHelper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(SeriesRequest $request, SeriesHelper $seriesHelper)
    {
        if (!Auth::check()) {
            return redirect()->route('in.index');
        }

        $serie = $seriesHelper->createSerie(
            $request->input('name'),
            $request->input('qtd_temporadas'),
            $request->input('ep_por_temporada')
        );

        $request->session()->flash('mensagem', "Série {$serie->id} criada com sucesso: {$serie->nome}");

        return redirect()->route('series.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Serie  $serie
     * @return \Illuminate\Http\Response
     */
    public function show(Serie $serie)
    {
        //
    }

    /**
     * @param Serie $series
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Serie $series)
    {
        if (!Auth::check()) {
            return redirect()->route('in.index');
        }

        return view('series.edit', compact('series'));
    }

    /**
     * @param Request $request
     * @param Serie $series
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Serie $series)
    {
        if (!Auth::check()) {
            return redirect()->route('in.index');
        }

        $series->update([
            'nome' => $request->input('name')
        ]);

        return redirect()->route('series.index');
    }

    /**
     * @param Request $request
     * @param Serie $series
     * @param SeriesHelper $seriesHelper
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Serie $series, SeriesHelper $seriesHelper)
    {
        $serieNome = $seriesHelper->removeSerie($series);

        $request->session()->flash('mensagem', "A série {$serieNome} foi removida com sucesso!");
        return redirect()->route('series.index');
    }
}
