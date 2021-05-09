<?php

namespace App\Model\Rover;

use App\Interfaces\Model\Rover\Rover as RoverI;

final class Rover implements RoverI
{
    private int $x;
    private int $y;
    private string $position;

    public function setX(int $value): void
    {
        $this->x = $value;
    }

    public function setY(int $value): void
    {
        $this->y = $value;
    }

    public function setPosition(string $value): void
    {
        $this->position = $value;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getPosition(): string
    {
        return $this->position;
    }
}