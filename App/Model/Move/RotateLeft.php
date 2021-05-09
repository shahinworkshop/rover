<?php

namespace App\Model\Move;

use App\Interfaces\Model\Rover\Rover;
use App\Interfaces\Model\Move\Movement;

final class RotateLeft extends Direction implements Movement
{
    public function execute(Rover $rover): Rover
    {
        switch ($rover->getPosition()) {
            case "N":
                $rover->setPosition('W');
                break;
            case "W":
                $rover->setPosition('S');
                break;
            case "S":
                $rover->setPosition('E');
                break;
            case "E":
                $rover->setPosition('N');
                break;
        }
        return $rover;
    }
}