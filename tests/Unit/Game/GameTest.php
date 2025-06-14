<?php

namespace Tests\Unit\Game;

use App\Models\Game\Game;
use App\Models\Game\Ruleset;
use PHPUnit\Framework\TestCase;

class GameTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testThatAGameCanBeCreated(): void
    {
        $game = new Game([
            'id' => 'game123',
            'ruleset' => ['name' => 'standard', 'version' => 'v1.1.1'],
            'timeout' => 5000,
            'map' => 'standard',
            'source' => 'league'
        ]);

        $this->assertInstanceOf(Game::class, $game, 'Game should be an instance of Game class');
        $this->assertEquals('game123', $game->getId(), 'Game ID should be game123');
        $this->assertEquals('standard', $game->getRuleset()->getName(), 'Game ruleset name should be standard');
        $this->assertEquals('v1.1.1', $game->getRuleset()->getVersion(), 'Game ruleset version should be v1.1.1');
        $this->assertEquals(5000, $game->getTimeout(), 'Game timeout should be 5000');
        $this->assertEquals('standard', $game->getMap(), 'Game map should be standard');
        $this->assertEquals('league', $game->getSource(), 'Game source should be league');
    }
}
