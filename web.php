<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Multiplication Table</title>
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <form action="/???" method="post"> 
        <div>
            <label for="size">Please input table size:</label>
            <input type="text" id="size" name="table_size" />
        <div>
    </form>
    <table>
        <?php

            require './vendor/autoload.php';

            $mt = new \Edmonds\MultiplicationTable();
            $size = 10;
            $table = $mt->getMultiplicationTable($size);

            foreach ($table as $row) {
                echo "<tr>";
                foreach ($row as $cell) {
                    echo "<td style='width:" . (100 / $size) . "%'>" . $cell . "</td>";
                }
                echo "</tr>";
            }        
        ?>
    </table>
  </body>   
</html>
