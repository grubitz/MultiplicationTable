<?php

namespace Edmonds;

class ConsolePrinter
{
    private $mt;

    public function __construct(MultiplicationTable $mt)
    {
        $this->mt = $mt;
    }

    public function print()
    {
        $table = $this->mt->getValues();
        $width = strlen(count($table) * count($table));
        $rowLength = count($table) * ($width + 1) + 1;
        $line = str_repeat("=", $rowLength) . "\n";
        foreach ($table as $row) {
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


