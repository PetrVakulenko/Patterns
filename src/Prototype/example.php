<?php

require_once "Prototype.php";

use DesignPatterns\Prototype\TerrainFactory;
use DesignPatterns\Prototype\Csv;
use DesignPatterns\Prototype\Xml;
use DesignPatterns\Prototype\Json;

/**
 * Создание фабрики с заданными параметрами прототипа
 */
$prototypeFactory = new TerrainFactory(
    new Xml(),
    new Csv(),
    new Json()
);

/**
 * Создание заданных объектов путём клонирования
 */
echo '<pre>';
$xml = $prototypeFactory->getXml();
var_dump($xml);
$csv = $prototypeFactory->getCsv();
var_dump($csv);
$json = $prototypeFactory->getJson();
var_dump($json);
