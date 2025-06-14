<?php

namespace Tests\Unit\Game;

use App\Models\Game\Board;

use Tests\TestCase;

class BoardTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testThatABoardCanBeCreated(): void
    {
        $board = new Board([
            'width' => 10,
            'height' => 10,
            'snakes' => [],
            'food' => [],
            'hazards' => []
        ]);

        $this->assertInstanceOf(Board::class, $board, 'Board should be an instance of Board class');
        $this->assertEquals(10, $board->getWidth(), 'Board width should be 10');
        $this->assertEquals(10, $board->getHeight(), 'Board height should be 10');
        $this->assertEmpty($board->getSnakes(), 'Board should have no snakes initially');
        $this->assertEmpty($board->getFood(), 'Board should have no food initially');
        $this->assertEmpty($board->getHazards(), 'Board should have no hazards initially');
    }
}
