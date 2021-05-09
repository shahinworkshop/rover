<?php

namespace App\Interfaces\Model\Move;

use App\Interfaces\Model\Rover\Rover;

interface Movement
{
    public function execute(Rover $rover): Rover;
}