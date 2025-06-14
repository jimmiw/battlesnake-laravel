<?php

namespace Tests\Unit\Game;

use PHPUnit\Framework\TestCase;
use App\Models\Game\Snake;

class SnakeTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testThatASnakeCanBeCreated(): void
    {
        // Sample snake data to test the Snake class
        $snakeData = [
            'id' => 'snake1',
            'name' => 'Test Snake',
            'health' => 100,
            'body' => [
                ['x' => 1, 'y' => 2],
                ['x' => 1, 'y' => 3],
                ['x' => 1, 'y' => 4],
            ],
            'head' => ['x' => 1, 'y' => 2],
            'length' => 3,
        ];

        $snake = new Snake($snakeData);

        $this->assertInstanceOf(Snake::class, $snake, 'Snake should be an instance of Snake class');
        $this->assertEquals('snake1', $snake->getId(), 'Snake ID should match');
        $this->assertEquals('Test Snake', $snake->getName(), 'Snake name should match');
        $this->assertEquals(100, $snake->getHealth(), 'Snake health should match');
        $this->assertEquals(3, $snake->getLength(), 'Snake length should match');
        $this->assertEquals($snakeData['head'], $snake->getHead()->toArray(), 'Snake head should match');

        // matching the body points, to the coordinates given in the data
        foreach ($snake->getBody() as $index => $point) {
            $snakeBody = $snakeData['body'][$index];
            $this->assertEquals($snakeBody['x'], $point->getX(), 'X coordinate of body point should match');
            $this->assertEquals($snakeBody['y'], $point->getY(), 'Y coordinate of body point should match');
        }
    }
}
