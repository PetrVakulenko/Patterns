<?php

namespace DesignPatterns\AbstractFactory;

/**
 * Interface Instance
 *
 * @package DesignPatterns\AbstractFactory
 */
interface Instance
{
    /**
     * @return mixed
     */
    public function getName();
}

/**
 * Class AbstractInstance
 *
 * @package DesignPatterns\AbstractFactory
 */
abstract class AbstractInstance implements Instance
{
    /**
     * @var
     */
    protected $instanceName;

    /**
     * @return string
     */
    public function getName(): string
    {
        return !empty($this->instanceName) ? "This is " . $this->instanceName : "";
    }
}

/**
 * Interface Factory
 *
 * @package DesignPatterns\AbstractFactory
 */
interface Factory
{
    /**
     * @param string $factoryName
     *
     * @return Factory
     */
    public static function getFactory(string $factoryName): Factory;

    /**
     * @param string $key
     *
     * @return Instance
     */
    public function getInstanceByKey(string $key): Instance;
}

/**
 * Class AbstractFactory
 *
 * @package DesignPatterns\AbstractFactory
 */
abstract class AbstractFactory implements Factory
{
    /**
     * @var
     */
    protected $instances;

    /**
     * @param string $factoryName
     *
     * @return Factory
     */
    public static function getFactory(string $factoryName): Factory
    {
        switch (strtolower($factoryName)) {
            case "form":
                return new FormFactory();
            case "button":
                return new ButtonFactory();
        }
    }

    /**
     * @param string $key
     *
     * @return Instance
     */
    public function getInstanceByKey(string $key): Instance
    {
        return $this->instances[$key];
    }
}

/**
 * Class FormFactory
 *
 * @package DesignPatterns\AbstractFactory
 */
class FormFactory extends AbstractFactory
{
    /**
     * FormFactory constructor.
     */
    public function __construct()
    {
        $this->instances['WebForm'] = new WebForm();
        $this->instances['LinuxForm'] = new LinuxForm();
    }
}

/**
 * Class WebForm
 *
 * @package DesignPatterns\AbstractFactory
 */
class WebForm extends AbstractInstance
{
    /**
     * @var string
     */
    protected $instanceName = 'WebForm';
}

/**
 * Class LinuxForm
 *
 * @package DesignPatterns\AbstractFactory
 */
class LinuxForm extends AbstractInstance
{
    /**
     * @var string
     */
    protected $instanceName = 'LinuxForm';
}


/**
 * Class ButtonFactory
 *
 * @package DesignPatterns\AbstractFactory
 */
class ButtonFactory extends AbstractFactory
{
    /**
     * ButtonFactory constructor.
     */
    public function __construct()
    {
        $this->instances['SubmitButton'] = new SubmitButton();
        $this->instances['SimpleButton'] = new SimpleButton();
    }
}

/**
 * Class SubmitButton
 *
 * @package DesignPatterns\AbstractFactory
 */
class SubmitButton extends AbstractInstance
{
    /**
     * @var string
     */
    protected $instanceName = 'SubmitButton';
}

/**
 * Class SimpleButton
 *
 * @package DesignPatterns\AbstractFactory
 */
class SimpleButton extends AbstractInstance
{
    /**
     * @var string
     */
    protected $instanceName = 'SimpleButton';
}
