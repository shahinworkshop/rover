<?php

use App\Model\Rover\RoverSquad;
use PHPUnit\Framework\TestCase;

class RoverSquadTestTest extends TestCase
{
    public function testSetup()
    {
        $rover = new App\Model\Rover\Rover();
        $roverSquad = new RoverSquad();
        $roverSquad->setRover($rover);

        $this->assertTrue($roverSquad instanceof \Iterator);

        foreach ($roverSquad as $key => $value) {
           $this->assertTrue($value instanceof \App\Interfaces\Model\Rover\Rover);
        }
    }
}
