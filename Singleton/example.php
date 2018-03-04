<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 02.03.2018
 * Time: 9:50
 */

require_once "Singleton.php";

use DesignPatterns\Singleton\Entity;

$entity1 = Entity::getIstance();
$entity1->incIterator();
var_dump($entity1->getIterator());

$entity2 = Entity::getIstance();
$entity2->incIterator();
var_dump($entity2->getIterator());