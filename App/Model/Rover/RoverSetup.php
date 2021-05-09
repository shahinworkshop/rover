<?php

namespace App\Model\Rover;

use App\Interfaces\Model\Command\Command;
use App\Interfaces\Model\Rover\Rover;
use App\Interfaces\Model\Plateau\Plateau;
use App\Model\Move\Direction;

final class RoverSetup implements Command
{
    private object $plateau;

    private function validateString(array $input): array
    {
        $status = true;
        $counter = 0;

        foreach ($input as $value) {
            if ($counter < 2 and !ctype_digit($value)) {
                $status = false;
            }
            if ($counter == 2 and !Direction::positionValidator($value)) {
                $status = false;
            }
            if ($counter > 2) {
                $status = false;
            }
            $counter++;
        }

        if($status)
            return $input;
        throw new \Exception('Your command line of "Rover initial position" was invalid!');
    }

    private function explode(string $input): array
    {
        return $this->validateString(explode(' ', $input));
    }

    public function setPlateau(Plateau $plateau): void
    {
        $this->plateau = $plateau;
    }

    public function setup(Rover $rover, string $input): Rover
    {
        $input = str_ireplace(PHP_EOL, '', $input);
        $result = $this->explode($input);

        if (!$this->plateau->isInArea($result[0], $result[1]))
            throw new \Exception('One of the rovers went out of Area!');

        $rover->setX($result[0]);
        $rover->setY($result[1]);
        $rover->setPosition(strtoupper($result[2]));

        return $rover;
    }
}