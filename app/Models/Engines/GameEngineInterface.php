<?php

namespace App\Models\Engines;

use App\Models\Game\MoveRequest;

interface GameEngineInterface
{
    /**
     * Process the move request and return the next move.
     *
     * @param MoveRequest $request The move request containing game data.
     * @return string The direction of the next move (e.g., 'up', 'down', 'left', 'right').
     */
    public function processMove(MoveRequest $request): string;

    /**
     * Get the name of the game engine.
     *
     * @return string The name of the game engine.
     */
    public function getName(): string;
}
