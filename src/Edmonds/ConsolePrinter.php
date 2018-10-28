<?php

namespace Edmonds;

class ConsolePrinter
{
    private $mt;

    const COL_DIVIDER_CHAR = "|"; 
    const ROW_DIVIDER_CHAR = "―"; 
    const COLOR_START = "\033[1;32m";
    const COLOR_END = "\033[0m";

    public function __construct(MultiplicationTable $mt)
    {
        $this->mt = $mt;
    }

    public function print()
    {
        $values = $this->mt->getValues();
        $colWidth = strlen(count($values) * count($values));

        foreach ($values as $rowNum => $row) {
            foreach ($row as $colNum => $col) {
                $cell = str_pad($col, $colWidth, " ", STR_PAD_LEFT) . self::COL_DIVIDER_CHAR;
                if ($rowNum === 1 || $colNum === 0) {
                    echo $this->getColoredString($cell);
                } else {
                    echo $cell;
                }
            }
            echo "\n";
            if ($rowNum === 1) {
                $divider = " " . str_repeat(self::ROW_DIVIDER_CHAR, (count($values) * ($colWidth + 1) - 1)) . "\n";
                echo $this->getColoredString($divider);
            }
        }
    }

    private function getColoredString(string $string) 
    {
        return self::COLOR_START . $string . self::COLOR_END;
    }
}
