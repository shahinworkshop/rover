<?php

namespace App\Model\Rover;

use App\Interfaces\Model\Rover\Rover;
use App\Interfaces\Model\Rover\RoverSquad as Squad;

class RoverSquad implements \Iterator, Squad
{
    private array $rovers;
    private int $position;

    public function __construct()
    {
        $this->position = 0;
        $this->rovers = [];
    }

    public function setRover(Rover $rover): void
    {
        $this->rovers[] = $rover;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->rovers[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function valid()
    {
        return isset($this->rovers[$this->position]);
    }
}