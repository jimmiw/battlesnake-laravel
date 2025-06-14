<?php

namespace App\Models\Game;

class Snake
{
    private string $id;
    private array $body = [];

    public function __construct(
        private array $data,
        private bool $isSelf = false
    ) {
        $this->id = $data['id'] ?? '';

        // parse the body of the snake, into coordinates
        $this->parseBody($this->data['body'] ?? []);
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->data['name'] ?? '';
    }

    public function getHealth(): int
    {
        return $this->data['health'] ?? 100;
    }

    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * checking if the snake is the player itself
     * @return bool
     */
    public function isSelf(): bool
    {
        return $this->isSelf;
    }

    public function getHead(): Point
    {
        return $this->body[0];
    }

    public function getLength(): int
    {
        return count($this->body);
    }

    /**
     * parse the body of the snake from the data array into point objects
     * @param array $body array of segments, each containing 'x' and 'y' coordinates
     */
    private function parseBody(array $body): void
    {
        // Store the parsed body in the data array
        foreach ($body as $coordinate) {
            $this->body[] = Point::create($coordinate);
        }
    }
}
