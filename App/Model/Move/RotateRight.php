<?php

namespace App\Model\Move;

use App\Interfaces\Model\Rover\Rover;
use App\Interfaces\Model\Move\Movement;

final class RotateRight extends Direction implements Movement
{
    public function execute(Rover $rover): Rover
    {
        switch ($rover->getPosition()) {
            case "N":
                $rover->setPosition('E');
                break;
            case "E":
                $rover->setPosition('S');
                break;
            case "S":
                $rover->setPosition('W');
                break;
            case "W":
                $rover->setPosition('N');
                break;
        }
        return $rover;
    }
}