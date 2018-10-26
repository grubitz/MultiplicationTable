<?php

namespace Edmonds;

class MultiplicationTable
{
    public function getMultiplicationTable(int $size)
    {
        $table = [];

        for ($row=1; $row<=$size; $row++) {
            for ($col=1; $col<=$size; $col++) {
                $table[$row][] = $row*$col;
            }
        }

        return $table;
    }
}
