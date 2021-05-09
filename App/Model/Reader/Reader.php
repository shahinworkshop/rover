<?php

namespace App\Model\Reader;

class Reader implements \Iterator, \Countable
{
    private array $lines;
    private int $position;

    public function __construct(string $file)
    {
        $this->position = 0;
        try {
            $handle = fopen($file, "r");
            while (($line = fgets($handle)) !== false) {
                $this->lines[] = $line;
            }

            fclose($handle);
        } catch (\Exception $e) {
            print_r($e);
        }
    }

    public function count( ): int
    {
        return count($this->lines);
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->lines[$this->position];
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
        return isset($this->lines[$this->position]);
    }
}