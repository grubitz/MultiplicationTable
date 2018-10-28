<?php
declare(strict_types=1);

namespace Edmonds;

require './vendor/autoload.php';

$size = isset($_GET["size"]) ? $_GET["size"] : null;
$size = Validator::validateSize($size);

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
    <?php
        $printer = new HTMLPrinter($mt);
        $printer->print();
    ?>
  </body>   
</html>
