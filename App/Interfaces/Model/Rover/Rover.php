<?php

namespace App\Interfaces\Model\Rover;

interface Rover
{
    public function setX(int $value): void;
    public function setY(int $value): void;
    public function setPosition(string $value): void;

    public function getX(): int;
    public function getY(): int;
    public function getPosition(): string;
}