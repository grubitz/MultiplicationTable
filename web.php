<?php

namespace Edmonds;

require './vendor/autoload.php';

$size = isset($_GET["size"]) ? $_GET["size"] : null;
$size = Validator::validate($size);

$mt = new MultiplicationTable($size);

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
            $printer = new HTMLPrinter($mt);
            $printer->print();
        ?>
    </table>
  </body>   
</html>
