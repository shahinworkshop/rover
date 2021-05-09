<?php

namespace App\Model\Move;

use App\Interfaces\Model\Command\Command;
use App\Interfaces\Model\Plateau\Plateau;
use App\Interfaces\Model\Rover\Rover;

class Direction implements Command
{
    protected Plateau $plateau;
    protected \Iterator $directions;

    public function commands(\Iterator $directions): void
    {
        $this->directions = $directions;
    }

    public static function positionValidator(string $value): bool
    {
        $value = strtoupper($value);
        if ($value === 'N' or $value === 'W' or $value === 'E' or $value === 'S')
            return true;
        return false;
    }

    private function movementValidator(string $value): bool
    {
        $value = strtoupper($value);
        if ($value === 'L' or $value === 'R' or $value === 'M')
            return true;
        return false;
    }

    private function validateString(array $input): array
    {
        if (empty($input))
            throw new \Exception('Your movement command line of "Rover" was empty!');

        foreach ($input as $value) {
            if (!$this->movementValidator($value))
                throw new \Exception('Your movement command line of "Rover" was invalid!');
        }

        return $input;
    }

    private function explode(string $input): array
    {
        return $this->validateString(str_split($input));
    }

    public function setPlateau(Plateau $plateau): void
    {
        $this->plateau = $plateau;
    }

    public function setup(Rover $rover, string $input): Rover
    {
        $input = str_ireplace(PHP_EOL, '', $input);
        $movements = $this->explode($input);

        foreach ($movements as $value) {
            foreach ($this->directions as $key => $command) {
                if($key === $value){
                    if(is_callable($command->setPlateau($this->plateau)))
                        $command->setPlateau($this->plateau);
                    $rover = $command->execute($rover);
                }
            }
        }

        return $rover;
    }
}