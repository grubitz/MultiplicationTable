<?php
declare(strict_types=1);

namespace Edmonds;

/**
 * Prints the multiplcation table to the console.
 */
class ConsolePrinter
{
    /** @var MultiplicationTable $table contains the table to print */
    private $table;

    const COL_DIVIDER_CHAR = "|"; 
    const ROW_DIVIDER_CHAR = "―"; 
    const COLOR_START = "\033[1;32m";
    const COLOR_END = "\033[0m";

    /**
     * Pass the table to be printed.
     * 
     * @param MultiplicationTable $table
     */
    public function __construct(MultiplicationTable $table)
    {
        $this->table = $table;
    }

    /**
     * Prints the multiplication table to the console.
     * 
     * @return void
     */
    public function print(): void
    {
        $values = $this->table->getValues();
        $colWidth = strlen((string)($this->table->getSize() * $this->table->getSize()));

        foreach ($values as $rowNum => $row) {
            foreach ($row as $colNum => $col) {
                $cell = str_pad((string)$col, $colWidth, " ", STR_PAD_LEFT) . self::COL_DIVIDER_CHAR;
                if ($rowNum === 1 || $colNum === 0) {
                    echo $this->getColoredString($cell);
                    continue;
                }
                echo $cell;
            }
            echo "\n";
            if ($rowNum === 1) {
                $divider = " " . str_repeat(self::ROW_DIVIDER_CHAR, (count($values) * ($colWidth + 1) - 1));
                echo $this->getColoredString($divider). "\n";
            }
        }
    }

    /**
     * Wraps the $string with color tags.
     * 
     * @param string $string
     * 
     * @return string
     */
    private function getColoredString(string $string): string 
    {
        return self::COLOR_START . $string . self::COLOR_END;
    }
}
