<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 02.03.2018
 * Time: 14:00
 */

require_once "AbstractFactory.php";

use DesignPatterns\AbstractFactory\AbstractFactory;

$testFactories = [
    "WebForm" => "Form",
    "LinuxForm" => "Form",
    "SubmitButton" => "Button",
    "SimpleButton" => "Button",
];

echo "<pre>";
foreach($testFactories as $className => $factory){
    $instance = AbstractFactory::getFactory($factory)->getInstanceByKey($className);
    var_dump($instance->getName());
}