<?php

declare(strict_types=1);

namespace DesignPatterns\Adapter;

/**
 * Interface ProductAdapter
 *
 * @package DesignPatterns\Adapter
 */
interface ProductAdapter
{
    /**
     * @return string
     */
    public function getProductInfo(): string;
}

/**
 * Class AdapterFactory
 *
 * @package DesignPatterns\Adapter
 */
abstract class AdapterFactory implements ProductAdapter
{
    /**
     * @param $instance
     *
     * @return mixed
     * @throws \Exception
     */
    public static function getInstance($instance): ProductAdapter
    {
        /**
         * Simple creating Adapter instance
         * $adapter = get_class($instance)."Adapter";
         */

        /**
         * Getting name with using ReflectionClass and Namespace
         */
        $adapter = __NAMESPACE__ . "\\" .
            (new \ReflectionClass($instance))->getShortName() . "Adapter";

        if (class_exists($adapter)) {
            return new $adapter($instance);
        } else {
            throw new \Exception("Undefined Adapter " . $adapter);
        }
    }

    /**
     * @return string
     */
    abstract public function getProductInfo(): string;
}

/**
 * Class SimpleProduct
 *
 * @package DesignPatterns\Adapter
 */
class SimpleProduct
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var int
     */
    private $price;

    /**
     * SimpleProduct constructor.
     *
     * @param string $title
     * @param int $price
     */
    public function __construct(string $title, int $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}

/**
 * Class SimpleProduct2
 *
 * @package DesignPatterns\Adapter
 */
class SimpleProduct2
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var int
     */
    private $price;

    /**
     * SimpleProduct2 constructor.
     *
     * @param string $title
     * @param int $price
     */
    public function __construct(string $title, int $price)
    {
        $this->title = $title;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}

/**
 * Class AnotherProduct
 *
 * @package DesignPatterns\Adapter
 */
class AnotherProduct
{
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $description;
    /**
     * @var string
     */
    private $article;
    /**
     * @var int
     */
    private $price;

    /**
     * AnotherProduct constructor.
     *
     * @param string $title
     * @param string $description
     * @param string $article
     * @param int $price
     */
    public function __construct(string $title, string $description, string $article, int $price)
    {
        $this->title = $title;
        $this->description = $description;
        $this->article = $article;
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getArticle(): string
    {
        return $this->article;
    }
}

/**
 * Class SimpleProductAdapter
 *
 * @package DesignPatterns\Adapter
 */
class SimpleProductAdapter implements ProductAdapter
{
    /**
     * @var SimpleProduct
     */
    private $product;

    /**
     * SimpleProductAdapter constructor.
     *
     * @param SimpleProduct $product
     */
    public function __construct(SimpleProduct $product)
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getProductInfo(): string
    {
        return $this->product->getTitle() . PHP_EOL .
            $this->product->getPrice() . PHP_EOL;
    }
}

/**
 * Class AnotherProductAdapter
 *
 * @package DesignPatterns\Adapter
 */
class AnotherProductAdapter implements ProductAdapter
{
    /**
     * @var AnotherProduct
     */
    private $product;

    /**
     * AnotherProductAdapter constructor.
     *
     * @param AnotherProduct $product
     */
    public function __construct(AnotherProduct $product)
    {
        $this->product = $product;
    }

    /**
     * @return string
     */
    public function getProductInfo(): string
    {
        return $this->product->getTitle() . PHP_EOL .
            $this->product->getDescription() . PHP_EOL .
            $this->product->getPrice() . PHP_EOL .
            $this->product->getArticle() . PHP_EOL;
    }
}
