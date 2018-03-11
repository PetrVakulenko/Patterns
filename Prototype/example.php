<?php
/**
 * Created by PhpStorm.
 * User: Petya
 * Date: 11.03.2018
 * Time: 10:51
 */

require_once "Prototype.php";

use DesignPatterns\Prototype\{
    TerrainFactory,
    Csv,
    Xml,
    Json
};

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