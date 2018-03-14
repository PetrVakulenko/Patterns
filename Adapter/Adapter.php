<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 14.03.2018
 * Time: 17:19
 */

namespace DesignPatterns\Adapter;

interface ProductAdapter {
    public function getProductInfo() : string;
}

class SimpleProduct
{
    private $title;
    private $price;
    public function __construct(string $title, int $price) {
        $this->title  = $title;
        $this->price = $price;
    }
    public function getPrice() : string
    {
        return $this->price;
    }
    public function getTitle() : string
    {
        return $this->title;
    }
}

class AnotherProduct
{
    private $title;
    private $description;
    private $article;
    private $price;
    public function __construct(string $title, string $description, string $article, int $price) {
        $this->title  = $title;
        $this->description = $description;
        $this->article = $article;
        $this->price = $price;
    }
    public function getPrice() : string
    {
        return $this->price;
    }
    public function getTitle() : string
    {
        return $this->title;
    }
    public function getDescription() : string
    {
        return $this->description;
    }

    public function getArticle() : string
    {
        return $this->article;
    }
}

class SimpleProductAdapter implements ProductAdapter{
    private $product;
    function __construct(SimpleProduct $product) {
        $this->product = $product;
    }
    function getProductInfo() : string
    {
        return $this->product->getTitle()."\n".
            $this->product->getPrice()."\n";
    }
}

class AnotherProductAdapter implements ProductAdapter{
    private $product;
    function __construct(AnotherProduct $product) {
        $this->product = $product;
    }
    function getProductInfo() : string
    {
        return $this->product->getTitle()."\n".
            $this->product->getDescription()."\n".
            $this->product->getPrice()."\n".
            $this->product->getArticle()."\n";
    }
}