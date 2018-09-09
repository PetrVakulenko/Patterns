<?php

require_once "AbstractFactory.php";

use DesignPatterns\AbstractFactory\AbstractFactory;

$testFactories = [
    "WebForm" => "Form",
    "LinuxForm" => "Form",
    "SubmitButton" => "Button",
    "SimpleButton" => "Button",
];

echo "<pre>";
foreach ($testFactories as $className => $factory) {
    $instance = AbstractFactory::getFactory($factory)->getInstanceByKey($className);
    var_dump($instance->getName());
}
