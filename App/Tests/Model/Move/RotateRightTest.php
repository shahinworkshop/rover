<?php

use PHPUnit\Framework\TestCase;

class RotateRightTest extends TestCase
{
    public function testMovement()
    {
        $plateau = new App\Model\Plateau\Plateau();
        $plateau->execute('5 5');

        $right = new App\Model\Move\RotateRight();
        $right->setPlateau($plateau);

        $rover = new App\Model\Rover\Rover();

        $roverSetup = new \App\Model\Rover\RoverSetup();
        $roverSetup->setPlateau($plateau);
        $rover = $roverSetup->setup($rover,'1 1 N');

        $rover = $right->execute($rover);
        $this->assertEquals('E', $rover->getPosition());
    }
}
