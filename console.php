<?php

namespace Edmonds;

require './vendor/autoload.php';

$size = isset($argv[1]) ? $argv[1] : null;
$size = Validator::validate($size);

$mt = new MultiplicationTable($size);
$table = $mt->getValues();

PrintToConsole::printToConsole($table);
