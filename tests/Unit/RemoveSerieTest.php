<?php

namespace Tests\Unit;

use App\Helpers\SeriesHelper;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RemoveSerieTest extends TestCase
{
    use RefreshDatabase;

    private $serie;

    protected function setUp(): void
    {
        parent::setUp();
        $this->serie = (new SeriesHelper())->createSerie('Nome da série', 1, 1);
    }

    public function testRemoveSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        $removerSerie = (new SeriesHelper())->removeSerie($this->serie);
        $this->assertIsString($removerSerie);
        $this->assertEquals($this->serie->nome, $removerSerie);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }
}
