<?php

use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    public function testDirections()
    {
        $rover = new App\Model\Rover\Rover();
        $rover->setPosition('N');
        $rover->setX(1);
        $rover->setY(2);

        $this->assertEquals('N', $rover->getPosition());
        $this->assertEquals(1, $rover->getX());
        $this->assertEquals(2, $rover->getY());
    }
}
