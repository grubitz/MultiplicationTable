<?php 
declare(strict_types=1);

namespace Edmonds;

/**
 * Prints the HTML representation of the table.
 */
class HTMLPrinter
{
    /** @var MultiplicationTable $mt contains the table to print */
    private $mt;
    
    /**
     * Pass the table to be printed.
     * 
     * @param MultiplicationTable $mt
     */
    public function __construct(MultiplicationTable $mt)
    {
        $this->mt = $mt;
    }

    /**
     * Prints the HTML representation of the table.
     * 
     * @return void
     */
    public function print(): void
    {
        $table = $this->mt->getValues();
        $size = $this->mt->getSize();
        echo "<table>";
        foreach ($table as $index => $row) {
            if ($index === 1) {
                echo "<tr><th>*</th>";
                foreach ($row as $cell) {
                    echo "<th style='width:" . (100 / ($size + 1)) . "%'>" . $cell . "</th>";
                }
                echo "</tr>";
            }
            echo "<tr>";
            echo "<th style='width:" . (100 / ($size + 1)) . "%'>{$index}</th>";
            foreach ($row as $cell) {
                echo "<td style='width:" . (100 / ($size + 1)) . "%'>" . $cell . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
