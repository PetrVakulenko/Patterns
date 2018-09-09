<?php

namespace DesignPatterns\Decorator;

/**
 * Interface IData
 *
 * @package DesignPatterns\Decorator
 */
interface IData
{
    /**
     * @return mixed
     */
    public function getData();
}

/**
 * Class SimpleMessage
 *
 * @package DesignPatterns\Decorator
 */
class SimpleMessage implements IData
{
    /**
     * @var string
     */
    protected $message;

    /**
     * SimpleMessage constructor.
     *
     * @param string $message
     */
    public function __construct(string $message)
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->message;
    }
}

/**
 * Class AbstractData
 *
 * @package DesignPatterns\Decorator
 */
abstract class AbstractData implements IData
{
    /**
     * @var IData
     */
    protected $data;

    /**
     * AbstractData constructor.
     *
     * @param IData $data
     */
    public function __construct(IData $data)
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getParagraphData(): string
    {
        return "<p>" . $this->data->getData() . "</p>";
    }
}

/**
 * Class BoldData
 *
 * @package DesignPatterns\Decorator
 */
class BoldData extends AbstractData
{
    /**
     * @return string
     */
    public function getData(): string
    {
        return "<b>" . $this->data->getData() . "</b>";
    }
}

/**
 * Class ItalicData
 *
 * @package DesignPatterns\Decorator
 */
class ItalicData extends AbstractData
{
    /**
     * @return string
     */
    public function getData(): string
    {
        return "<i>" . $this->data->getData() . "</i>";
    }
}

/**
 * Class LineBreakData
 *
 * @package DesignPatterns\Decorator
 */
class LineBreakData extends AbstractData
{
    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data->getData() . "<br>";
    }
}
