<?php

use PHPUnit\Framework\TestCase;

class PrinterTest extends TestCase
{
    /**
     * @doesNotPerformAssertions
     */
    public function testFormatResult(): void
    {
        $squads = new \App\Model\Rover\RoverSquad();
        $printer = new \App\controller\Printer();
        $printer->rovers($squads);
    }
}
