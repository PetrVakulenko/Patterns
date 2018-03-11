<?php
/**
 * Created by PhpStorm.
 * User: Petya
 * Date: 11.03.2018
 * Time: 10:38
 */

namespace DesignPatterns\Prototype;
/**
 * Class DataType
 * @package DesignPatterns\Prototype
 */
abstract class DataType {
    /**
     * @var string
     */
    protected $type = '';

    /**
     * @return string
     */
    public function getType() : string
    {
        return $this->type ?? '';
    }
}

/**
 * Class Xml
 * @package DesignPatterns\Prototype
 */
class Xml extends DataType {
    /**
     * @var string
     */
    protected $type = "Xml";
}

/**
 * Class Csv
 * @package DesignPatterns\Prototype
 */
class Csv extends DataType {
    /**
     * @var string
     */
    protected $type = "Csv";
}

/**
 * Class Json
 * @package DesignPatterns\Prototype
 */
class Json extends DataType {
    /**
     * @var string
     */
    protected $type = "Json";
}

/**
 * Определение логики фабрики прототипов
 */
class TerrainFactory {
    /**
     * @var Xml
     */
    private $xml;
    /**
     * @var Csv
     */
    private $csv;
    /**
     * @var Json
     */
    private $json;

    /**
     * TerrainFactory constructor.
     * @param Xml $xml
     * @param Csv $csv
     * @param Json $json
     */
    public function __construct(Xml $xml, Csv $csv, Json $json) {
        $this->xml = $xml;
        $this->csv = $csv;
        $this->json = $json;
    }

    /**
     * @return Xml
     */
    public function getXml() : Xml
    {
        return clone $this->xml;
    }

    /**
     * @return Csv
     */
    public function getCsv() : Csv
    {
        return clone $this->csv;
    }

    /**
     * @return Json
     */
    public function getJson() : Json
    {
        return clone $this->json;
    }
}