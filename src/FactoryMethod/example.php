<?php

require_once "FactoryMethod.php";

use DesignPatterns\FactoryMethod\AnimalCreator;

$animals = ["Dog", "Cat", "Sparrow"];
$echoData = '';

foreach ($animals as $animal) {
    $instance = AnimalCreator::getInstance($animal);
    $echoData .= $instance->voice();
}

echo "<pre>" . $echoData . "</pre>";
