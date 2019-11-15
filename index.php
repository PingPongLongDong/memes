<?php

use Drugalev\DrugalevException;
use Drugalev\Log;
use Drugalev\QuadraticEquation;

ini_set("display_errors", 1);
error_reporting(-1);
require_once("autoload.php");

echo "Введите 3 параметра a, b и с\n";
$a = (float)readline("a:");
$b = (float)readline("b:");
$c = (float)readline("c:");

$logString = "Введено уравнение: $a"."x^2" .
    (($b < 0) ? $b : "+$b") . "x".
    (($c < 0) ? $c : "+$c") . "=0";
Log::log($logString);

try {
    $equation = new QuadraticEquation();
    $result = $equation->solve($a, $b, $c);
    Log::log("Корни уравнения: " . implode(", ", $result));
} catch (DrugalevException $e) {
    Log::log($e->getMessage());
}
Log::write();
