<?php

namespace Tests\Unit;

use App\Helpers\SeriesHelper;
use App\Serie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSerieTest extends TestCase
{
    use RefreshDatabase;

    public function testCriarSerie()
    {
        $serieCreate = new SeriesHelper();
        $nomeSerie = 'Teste';
        $serie = $serieCreate->createSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serie);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serie->id, 'numero' => 1]);
        $this->assertDatabaseHas('episodios', ['numero' => 1]);
    }
}
