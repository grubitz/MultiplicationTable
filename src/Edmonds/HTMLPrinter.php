<?php 

namespace Edmonds;

class HTMLPrinter
{
    private $mt;
    
    public function __construct(MultiplicationTable $mt)
    {
        $this->mt = $mt;
    }

    public function print()
    {
        $table = $this->mt->getValues();
        $size = $this->mt->getSize();
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
    }
}