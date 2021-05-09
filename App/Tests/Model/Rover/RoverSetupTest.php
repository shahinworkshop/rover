<?php

use PHPUnit\Framework\TestCase;

class RoverSetupTest extends TestCase
{
    public function testSetup()
    {
        $directions = new \App\Model\Commands\Directions();
        $directions->setCommand('L', new \App\Model\Move\RotateLeft());
        $directions->setCommand('M', new \App\Model\Move\Move());
        $directions->setCommand('R', new \App\Model\Move\RotateRight());

        $plateau = new App\Model\Plateau\Plateau();
        $plateau->execute('5 5');

        $rover = new App\Model\Rover\Rover();

        $roverSetup = new \App\Model\Rover\RoverSetup();
        $roverSetup->setPlateau($plateau);
        $rover = $roverSetup->setup($rover,'1 1 N');

        $this->assertEquals('N', $rover->getPosition());
        $this->assertEquals(1, $rover->getY());
        $this->assertEquals(1, $rover->getX());
    }
}
