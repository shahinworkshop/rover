<?php

namespace App\Interfaces\Model\Command;
use App\Interfaces\Model\Rover\Rover;
use App\Interfaces\Model\Plateau\Plateau;

interface Command
{
    public function setup(Rover $rover, string $input): Rover;
    public function setPlateau(Plateau $plateau): void;
}