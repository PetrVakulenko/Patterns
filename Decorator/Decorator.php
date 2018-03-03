<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 03.03.18
 * Time: 17:29
 */

namespace DesignPatterns\Decorator;

interface IData
{
    public function getData();
}

class Message implements IData
{
    protected $message;

    public function __construct(string $message) {
        $this->message = $message;
    }

    public function getData() : string
    {
        return $this->message;
    }
}

class BoldMessage implements IData
{
    protected $object;

    public function __construct(IData $data) {
        $this->object = $data;
    }

    public function getData() : string
    {
        return "<b>" . $this->object->getData() . "</b>";
    }
}

class ItalicMessage implements IData
{
    protected $object;

    public function __construct(IData $data) {
        $this->object = $data;
    }

    public function getData() : string
    {
        return "<i>" . $this->object->getData() . "</i>";
    }
}

class LineBreakMessage implements IData
{
    protected $object;

    public function __construct(IData $data) {
        $this->object = $data;
    }

    public function getData() : string
    {
        return $this->object->getData() . "<br>";
    }
}