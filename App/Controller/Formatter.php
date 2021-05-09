<?php


namespace App\controller;


class Formatter
{
    public function format(int $x, int $y, string $position): string
    {
        return $x . ' ' . $y . ' ' . $position . PHP_EOL;
    }
}