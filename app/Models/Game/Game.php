<?php

namespace App\Models\Game;

class Game
{
    public function __construct(
        private array $data
    ) {
    }

    /**
     * Fetches the game ID.
     * @return string The game ID, defaulting to an empty string if not set.
     */
    public function getId(): string
    {
        return $this->data['id'] ?? '';
    }

    public function getRuleset(): Ruleset
    {
        return new Ruleset($this->data['ruleset'] ?? []);
    }

    public function getMap(): string
    {
        return $this->data['map'] ?? '';
    }

    public function getTimeout(): int
    {
        return $this->data['timeout'] ?? 0;
    }

    public function getSource(): string
    {
        return $this->data['source'] ?? '';
    }
}
