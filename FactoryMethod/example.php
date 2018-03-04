<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 04.03.2018
 * Time: 13:50
 */

require_once "FactoryMethod.php";

use DesignPatterns\FactoryMethod;

$animals = [ "Dog", "Cat", "Sparrow" ];
$echoData = '';

foreach($animals as $animal) {
    $instance = FactoryMethod\AnimalCreator::getInstance($animal);
    $echoData .= $instance->voice();
}

echo "<pre>".$echoData."</pre>";
