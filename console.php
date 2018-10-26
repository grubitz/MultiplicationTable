<?php

namespace Edmonds;

require './vendor/autoload.php';

$mt = new MultiplicationTable();

$size = isset($argv[1]) ? $argv[1] : null;
$size = Validator::validate($size);


PrintToConsole::printToConsole($mt->getMultiplicationTable($size));
