<?php

namespace Edmonds;

require './vendor/autoload.php';

$size = isset($_GET["size"]) ? $_GET["size"] : null;
$size = Validator::validate($size);

$mt = new MultiplicationTable($size);
$table = $mt->getValues();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Multiplication Table</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <form action="/web.php" method="get"> 
        <div>
            <label for="size">Please input table size:</label>
            <input id="size" type="text" name="size" value="<?= $size ?>" />
            <input type="submit" value="Multiply!" /> 
        </div>
    </form>
    <table>
        <?php
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
        ?>
    </table>
  </body>   
</html>
