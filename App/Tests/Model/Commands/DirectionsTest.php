<?php

use PHPUnit\Framework\TestCase;

class DirectionsTest extends TestCase
{
    public function testSetCommand()
    {
        $directions = new \App\Model\Commands\Directions();
        $directions->setCommand('L', new \App\Model\Move\RotateLeft());

        $this->assertTrue($directions instanceof \Iterator);

        foreach($directions as $key => $value){
            $this->assertEquals('L', $key);
            $this->assertTrue($value instanceof \App\Interfaces\Model\Move\Movement);
        }
    }
}
