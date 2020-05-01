<?php

namespace App\Http\Controllers;

use App\Serie;
use App\Temporada;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    /**
     * @param Serie $series
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Serie $series)
    {
        return view('temporadas.index', compact('series'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function show(Temporada $temporada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function edit(Temporada $temporada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Temporada $temporada)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temporada  $temporada
     * @return \Illuminate\Http\Response
     */
    public function destroy(Temporada $temporada)
    {
        //
    }
}
