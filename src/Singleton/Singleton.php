<?php

namespace DesignPatterns\Singleton;

/**
 * Class Singleton
 *
 * @package Patterns\Singleton
 */
class Entity
{
    /**
     * @var null
     */
    private static $instance = null;
    /**
     * @var int
     */
    private $iterator = 0;

    /**
     * Private Singleton __constructor, __wakeup and __clone
     */
    private function __construct()
    {
    }

    private function __wakeup()
    {
    }

    private function __clone()
    {
    }

    /**
     * @param string $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        echo "Undefined method '" . $name . "'." .
            (count($arguments) > 0
                ? "Arguments: " . implode(',', $arguments) . "."
                : "");
    }

    /**
     * @param string $name
     * @param $arguments
     */
    public static function __callStatic($name, $arguments)
    {
        echo "Undefined static method '" . $name . "'." .
            (count($arguments) > 0
                ? "Arguments: " . implode(',', $arguments) . "."
                : "");
    }

    /**
     * @return static instance|new static instance
     */
    public static function getIstance()
    {
        return self::$instance === null
            ? self::$instance = new static() //new self()
            : self::$instance;
    }

    /**
     * Incrementation of iterator
     */
    public function incIterator()
    {
        $this->iterator++;
    }

    /**
     * @return int
     */
    public function getIterator(): int
    {
        return $this->iterator;
    }
}
