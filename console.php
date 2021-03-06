<?php
declare(strict_types=1);

namespace Edmonds;

require './vendor/autoload.php';

$size = isset($argv[1]) ? $argv[1] : null;
$validator = new Validator();
$size = $validator->validateSize($size);

$table = new MultiplicationTable($size);

$printer = new ConsolePrinter($table);
$printer->print();
