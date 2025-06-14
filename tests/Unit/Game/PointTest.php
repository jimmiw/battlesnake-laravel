<?php

namespace Tests\Unit\Game;

use PHPUnit\Framework\TestCase;
use App\Models\Game\Point;

class PointTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function testThatAPointCanBeCreated(): void
    {
        $point = Point::create(['x' => 5, 'y' => 10]);

        $this->assertInstanceOf(Point::class, $point, 'Point should be an instance of Point class');
        $this->assertEquals(5, $point->getX(), 'X coordinate should be 5');
        $this->assertEquals(10, $point->getY(), 'Y coordinate should be 10');
        $this->assertEquals(['x' => 5, 'y' => 10], $point->toArray(), 'Point toArray should return correct coordinates');
    }

    public function testThatPointCreationFailsWithInvalidData(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        Point::create(['x' => 5]); // Missing 'y' key
    }
}
