<?php

require './vendor/autoload.php';

$mt = new \Edmonds\MultiplicationTable();

$mt->printToConsole($mt->getMultiplicationTable(10));
