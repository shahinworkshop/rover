<?php

use PHPUnit\Framework\TestCase;

class PlateauTest extends TestCase
{
    public function testSetup()
    {
        $directions = new \App\Model\Commands\Directions();
        $directions->setCommand('L', new \App\Model\Move\RotateLeft());
        $directions->setCommand('M', new \App\Model\Move\Move());
        $directions->setCommand('R', new \App\Model\Move\RotateRight());

        $plateau = new App\Model\Plateau\Plateau();
        $plateau->execute('5 5');

        $this->assertEquals(5, $plateau->getMaxY());
        $this->assertEquals(5, $plateau->getMaxX());
        $this->assertEquals(0, $plateau->getMinX());
        $this->assertEquals(0, $plateau->getMinY());
    }
}
