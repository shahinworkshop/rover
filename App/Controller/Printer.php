<?php

namespace App\controller;
use App\Interfaces\Model\Rover\RoverSquad;

class Printer
{
    public function rovers(RoverSquad $squad): bool
    {
        $formatter = new Formatter;
        foreach ($squad as $rover) {
            echo $formatter->format($rover->getX(), $rover->getY(), $rover->getPosition());
        }
        return true;
    }
}