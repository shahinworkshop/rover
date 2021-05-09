<?php

use PHPUnit\Framework\TestCase;

class RotateLeftTest extends TestCase
{
    public function testMovement()
    {
        $plateau = new App\Model\Plateau\Plateau();
        $plateau->execute('5 5');

        $left = new App\Model\Move\RotateLeft();
        $left->setPlateau($plateau);

        $rover = new App\Model\Rover\Rover();

        $roverSetup = new \App\Model\Rover\RoverSetup();
        $roverSetup->setPlateau($plateau);
        $rover = $roverSetup->setup($rover,'1 1 N');

        $rover = $left->execute($rover);
        $this->assertEquals('W', $rover->getPosition());
    }
}
