<?php

namespace App\Interfaces\Model\Plateau;

interface Plateau
{
    public function getMaxX(): int;
    public function getMaxY(): int;
    public function getMinX(): int;
    public function getMinY(): int;
    public function execute(string $input): bool;
}