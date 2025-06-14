<?php

namespace App\Models\Game;

/**
 * The game board is represented by a standard 2D grid, oriented with (0,0) in the bottom left.
 * The Y-Axis is positive in the up direction, and X-Axis is positive to the right.
 * Coordinates begin at zero, such that a board that is 11x11 will have coordinates
 * ranging from [0, 10].
 */
class Board
{
    private array $snakes = [];
    private array $foods = [];
    private array $hazards = [];

    public function __construct(
        public array $data
    ) {
    }

    public function getWidth(): int
    {
        return $this->data['width'] ?? 0;
    }

    public function getHeight(): int
    {
        return $this->data['height'] ?? 0;
    }

    /**
     * Fetches the list of snakes on the board.
     * @return Snake[] An array of Snake objects representing all snakes on the board.
     */
    public function getSnakes(): array
    {
        if (empty($this->snakes)) {
            // Parse snakes if not already done
            foreach ($this->data['snakes'] ?? [] as $snakeData) {
                $isSelf = isset($snakeData['id']) && $snakeData['id'] === ($this->data['you']['id'] ?? '');
                $this->snakes[] = new Snake($snakeData, $isSelf);
            }
        }

        return $this->snakes;
    }

    /**
     * Fetches the food coordinates on the board.
     * @return Point[] An array of Point objects representing food locations.
     */
    public function getFood(): array
    {
        if (empty($this->foods)) {
            foreach ($this->data['food'] ?? [] as $food) {
                $this->foods[] = Point::create($food);
            }
        }

        return $this->foods;
    }

    /**
     * Fetches the hazards coordinates on the board.
     * @return Point[] An array of Point objects representing hazard locations.
     */
    public function getHazards(): array
    {
        if (empty($this->hazards)) {
            foreach ($this->data['hazards'] ?? [] as $hazard) {
                $this->hazards[] = Point::create($hazard);
            }
        }

        return $this->hazards;
    }
}
