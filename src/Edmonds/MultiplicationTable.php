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


    public function printToConsole(array $table)
    {
        $width = strlen(count($table) * count($table));
        $rowLength = count($table) * ($width + 1) + 1;
        $line = str_repeat("=", $rowLength) . "\n";
        foreach ($table as $index => $row) {
            echo $line;
            echo "|";
            foreach ($row as $cell) {
                echo str_pad($cell, $width, " ", STR_PAD_LEFT);
                echo "|";
            }
            echo "\n";
        }
        echo $line;
    }
}
