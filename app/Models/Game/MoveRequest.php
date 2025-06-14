<?php

namespace App\Models\Game;

class MoveRequest
{
    private Game $game;
    private Snake $you;
    private Board $board;

    public function __construct(
        public array $data
    ) {
        // Initialize the game request with the provided data
    }

    public function getGame(): Game
    {
        if (!isset($this->game)) {
            // Create a new Game object if not already set
            $this->game = new Game($this->data['game'] ?? []);
        }

        return $this->game;
    }

    /**
     * Fetches the turn number for this move request.
     * @return int The turn number, defaulting to 0 if not set.
     */
    public function getTurn(): int
    {
        return $this->data['turn'] ?? 0;
    }

    /**
     * Fetches the player's snake.
     * @return Snake The snake object representing the player.
     */
    public function getYou(): Snake
    {
        if (!isset($this->you)) {
            // Create a new Snake object for the player if not already set
            $this->you = new Snake($this->data['you'] ?? []);
        }

        return $this->you;
    }

    /**
     * Fetches the game board.
     * @return Board The board object containing the game state.
     */
    public function getBoard(): Board
    {
        if (!isset($this->board)) {
            // Create a new Board object if not already set
            $this->board = new Board($this->data['board'] ?? [], $this->getYou()->getId());
        }

        return $this->board;
    }
}
