<?php

use PHPUnit\Framework\TestCase;

class MoveTest extends TestCase
{
    public function testMovement()
    {
        $plateau = new App\Model\Plateau\Plateau();
        $plateau->execute('5 5');

        $move = new App\Model\Move\Move();
        $move->setPlateau($plateau);

        $rover = new App\Model\Rover\Rover();

        $roverSetup = new \App\Model\Rover\RoverSetup();
        $roverSetup->setPlateau($plateau);
        $rover = $roverSetup->setup($rover,'1 1 N');

        $initial = $move->execute($rover);
        $this->assertEquals(2, $initial->getY());

        $north = $move->north($initial);
        $this->assertEquals(3, $north->getY());

        $west = $move->west($north);
        $this->assertEquals(0, $west->getX());

        $east = $move->east($west);
        $this->assertEquals(1, $east->getX());

        $south = $move->south($east);
        $this->assertEquals(2, $south->getY());
    }
}
