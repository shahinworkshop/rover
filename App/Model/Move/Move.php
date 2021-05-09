<?php

namespace App\Model\Move;

use App\Interfaces\Model\Rover\Rover;
use App\Interfaces\Model\Plateau\Plateau;
use App\Interfaces\Model\Move\Movement;

final class Move extends Direction implements Movement
{
    public function north(Rover $rover): Rover
    {
        if (($rover->getY() + 1) > $this->plateau->getMaxY())
            throw new \Exception('Moving north will leave the plateau!');
        $rover->setY($rover->getY() + 1);
        return $rover;
    }

    public function east(Rover $rover): Rover
    {
        if (($rover->getX() + 1) > $this->plateau->getMaxX())
            throw new \Exception('Moving east will leave the plateau!');
        $rover->setX($rover->getX() + 1);

        return $rover;
    }

    public function west(Rover $rover): Rover
    {
        if (($rover->getX() - 1) < $this->plateau->getMinX())
            throw new \Exception('Moving west will leave the plateau!');
        $rover->setX($rover->getX() - 1);

        return $rover;
    }

    public function south(Rover $rover): Rover
    {
        if (($rover->getY() - 1) < $this->plateau->getMinY())
            throw new \Exception('Moving south will leave the plateau!');
        $rover->setY($rover->getY() - 1);

        return $rover;
    }

    public function setPlateau(Plateau $plateau): void
    {
        parent::setPlateau($plateau);
    }

    public function execute(Rover $rover): Rover
    {
        switch ($rover->getPosition()) {
            case "N":
                $rover = $this->north($rover);
                break;
            case "W":
                $rover = $this->west($rover);
                break;
            case "E":
                $rover = $this->east($rover);
                break;
            case "S":
                $rover = $this->south($rover);
                break;
        }

        return $rover;
    }
}