<?php

namespace Edmonds;

class MultiplicationTable
{
    private $size;

    public function __construct(int $size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

    public function getValues()
    {
        $table = [];

        for ($row=1; $row<=$this->size; $row++) {
            for ($col=1; $col<=$this->size; $col++) {
                $table[$row][] = $row*$col;
            }
        }

        return $table;
    }
}
