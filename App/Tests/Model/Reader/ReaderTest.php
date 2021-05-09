<?php

use PHPUnit\Framework\TestCase;

class ReaderTest extends TestCase
{
    public function testSetup()
    {
        $reader = new App\Model\Reader\Reader(dirname(__FILE__) . DS . 'commands.txt');

        $this->assertTrue($reader instanceof \Iterator);
        $this->assertCount(5, $reader);
    }
}
