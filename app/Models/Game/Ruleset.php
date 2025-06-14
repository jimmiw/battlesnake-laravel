<?php

namespace App\Models\Game;

class Ruleset
{
    public function __construct(
        private array $data
    ) {
    }

    public function getName(): string
    {
        return $this->data['name'] ?? '';
    }

    public function getVersion(): string
    {
        return $this->data['version'] ?? '';
    }
}
