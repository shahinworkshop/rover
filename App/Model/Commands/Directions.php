<?php

namespace App\Model\Commands;

class Directions implements \Iterator
{
    private array $directions;
    private array $keys;
    private int $position;

    public function __construct()
    {
        $this->position = 0;
        $this->directions = [];
        $this->keys = [];
    }

    public function setCommand(string $command, $action): void
    {
        $this->keys[] = $command;
        $this->directions[] = $action;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->directions[$this->position];
    }

    public function key()
    {
        return $this->keys[$this->position];
    }

    public function next()
    {
        $this->position++;
    }

    public function valid()
    {
        return isset($this->directions[$this->position]);
    }
}