<?php

namespace App\Models\Game;

class Point
{
    public function __construct(
        private int $x,
        private int $y)
    {
        // Initialize the point with x and y coordinates
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function toArray(): array
    {
        return ['x' => $this->x, 'y' => $this->y];
    }

    /**
     * Creates a Point object from an associative array with 'x' and 'y' keys.
     * Returns null if the required keys are not present.
     *
     * @param array $coordinate Associative array containing 'x' and 'y' keys.
     * @return Point A Point object
     * @throws \InvalidArgumentException If the coordinate data is invalid.
     */
    public static function create(array $coordinate): Point
    {
        if (isset($coordinate['x']) && isset($coordinate['y'])) {
            return new Point((int)$coordinate['x'], (int)$coordinate['y']);
        }
        throw new \InvalidArgumentException('Invalid coordinate data');
    }
}
