<?php 
declare(strict_types=1);

namespace Edmonds;

/**
 * Prints the HTML representation of the table.
 */
class HTMLPrinter
{
    /** @var MultiplicationTable $table contains the table to print */
    private $table;
    
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
     * Prints the HTML representation of the table.
     * 
     * @return void
     */
    public function print(): void
    {
        $values = $this->table->getValues();
        $size = $this->table->getSize();
        echo "<table>";
        foreach ($values as $index => $row) {
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
