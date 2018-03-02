<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 02.03.18
 * Time: 9:50
 */

require_once "Singleton.php";

use Patterns\Singleton\Singleton;

$entity1 = Singleton::getIstance();
$entity1->incIterator();
$entity1->test();
var_dump($entity1->getIterator());

$entity2 = Singleton::getIstance();
$entity2->incIterator();
var_dump($entity2->getIterator());