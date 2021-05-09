<?php

use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    public function testPositionValidator()
    {
        $result = \App\Model\Move\Direction::positionValidator('W');
        $this->assertTrue($result);
        $result = \App\Model\Move\Direction::positionValidator('G');
        $this->assertFalse($result);
        $result = \App\Model\Move\Direction::positionValidator('1');
        $this->assertFalse($result);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testCommands()
    {
        $directions = new \App\Model\Commands\Directions();
        $direction = new \App\Model\Move\Direction();
        $direction->commands($directions);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testSetPlateau()
    {
        $plateau = new App\Model\Plateau\Plateau();
        $direction = new \App\Model\Move\Direction();
        $direction->setPlateau($plateau);
    }

    public function testSetup()
    {
        $directions = new \App\Model\Commands\Directions();
        $directions->setCommand('L', new \App\Model\Move\RotateLeft());
        $directions->setCommand('M', new \App\Model\Move\Move());
        $directions->setCommand('R', new \App\Model\Move\RotateRight());
        $direction = new \App\Model\Move\Direction();

        $plateau = new App\Model\Plateau\Plateau();
        $plateau->execute('5 5');

        $rover = new App\Model\Rover\Rover();

        $roverSetup = new \App\Model\Rover\RoverSetup();
        $roverSetup->setPlateau($plateau);
        $rover = $roverSetup->setup($rover,'1 1 N');

        $direction->setPlateau($plateau);
        $direction->commands($directions);
        $result = $direction->setup($rover, 'LMLLMLM');

        $this->assertEquals('N', $result->getPosition());
        $this->assertEquals(2, $result->getY());
        $this->assertEquals(1, $result->getX());
    }
}
