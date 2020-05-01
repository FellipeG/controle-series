<?php


namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\{Serie, Temporada, Episodio};

class SeriesHelper
{

    /**
     * @param String $nomeSerie
     * @param int $qtdTemporadas
     * @param int $epPorTemporada
     * @return Serie
     */
    public function createSerie(String $nomeSerie, int $qtdTemporadas, int $epPorTemporada) : Serie
    {
        $serie = Serie::create(['nome' => $nomeSerie]);

        DB::beginTransaction();
            $this->createTemporadas($serie, $qtdTemporadas, $epPorTemporada);
        Db::commit();

        return $serie;
    }

    private function createTemporadas(Serie $serie, int $qtdTemporadas, int $epPorTemporada)
    {
        for($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create([
                'numero' => $i
            ]);

            $this->createEpisodios($temporada, $epPorTemporada);
        }
    }

    private function createEpisodios($temporada, int $epPorTemporada)
    {
        for($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create([
                'numero' => $j
            ]);
        }
    }

    public function removeSerie(Serie $serie) : string
    {
        $serieNome = $serie->nome;

        DB::beginTransaction();
            $this->removerTemporadas($serie);
            $serie->delete();
        DB::commit();

        return $serieNome;
    }

    private function removerTemporadas(Serie $serie)
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodios($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodios(Temporada $temporada)
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
