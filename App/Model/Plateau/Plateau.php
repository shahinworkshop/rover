<?php

namespace App\Model\Plateau;

use App\Interfaces\Model\Plateau\Plateau as PlateauI;

class Plateau implements PlateauI
{
    private int $x;
    private int $y;

    public function getMaxX(): int
    {
        return $this->x;
    }

    public function getMaxY(): int
    {
        return $this->y;
    }

    public function getMinX(): int
    {
        return 0;
    }

    public function getMinY(): int
    {
        return 0;
    }

    private function validator(array $input): array
    {
        if ((isset($input[0]) and ctype_digit($input[0])) and isset($input[1]) and ctype_digit($input[1]))
            return $input;

        throw new \Exception('Your command line of "Plateau" was invalid!');
    }

    private function exploder(string $input): array
    {
        $result = explode(' ', $input);
        return $this->validator($result);
    }

    public function isInArea($x, $y): bool
    {
        if ($x > $this->x or $y > $this->y)
            return false;
        return true;
    }

    public function execute(string $input): bool
    {
        $input = str_ireplace(PHP_EOL, '', $input);

        $result = $this->exploder($input);
        $this->x = $result[0];
        $this->y = $result[1];

        return true;
    }
}