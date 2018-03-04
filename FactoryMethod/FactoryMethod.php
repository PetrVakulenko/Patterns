<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 04.03.2018
 * Time: 13:49
 */

namespace DesignPatterns\FactoryMethod;

/**
 * Interface Animal
 * @package DesignPatterns\FactoryMethod
 */
interface Animal{
    /**
     * @return string
     */
    public function voice() : string;
}

/**
 * Class AnimalCreator
 * @package DesignPatterns\FactoryMethod
 */
abstract class AnimalCreator implements Animal {
    /**
     * @var string
     */
    protected $className;

    /**
     * @param string $className
     * @return Animal
     */
    final public static function getInstance(string $className) : Animal
    {
        $class = __NAMESPACE__ . "\\" . $className;
        return class_exists($class)
            ? new $class($className)
            : new NullAnimal($className);
    }

    /**
     * AnimalCreator constructor.
     * @param string $className
     */
    public function __construct(string $className){
        $this->className = $className;
    }

    /**
     * @return string
     */
    final protected function getClassName(): string
    {
        return $this->className;
    }
}

/**
 * Class NullAnimal
 * @package DesignPatterns\FactoryMethod
 */
class NullAnimal extends AnimalCreator{
    /**
     * @return string
     */
    public function voice() : string
    {
        return "Class ".$this->getClassName()." not defined" . PHP_EOL;
    }
}

/**
 * Class Cat
 * @package DesignPatterns\FactoryMethod
 */
class Cat extends AnimalCreator{
    /**
     * @return string
     */
    public function voice() : string
    {
        return $this->getClassName() . ": Meow!" . PHP_EOL;
    }
}

/**
 * Class Dog
 * @package DesignPatterns\FactoryMethod
 */
class Dog extends AnimalCreator{
    /**
     * @return string
     */
    public function voice() : string
    {
        return $this->getClassName() . ": Wuf!" . PHP_EOL;
    }
}