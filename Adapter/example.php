<?php

require_once "Adapter.php";

use DesignPatterns\Adapter\SimpleProduct;
use DesignPatterns\Adapter\SimpleProduct2;
use DesignPatterns\Adapter\AnotherProduct;
use DesignPatterns\Adapter\SimpleProductAdapter;
use DesignPatterns\Adapter\AnotherProductAdapter;
use DesignPatterns\Adapter\AdapterFactory;

/**
 * Simple using Adapter
 */
$product1 = new SimpleProduct("Title", 123);
$product2 = new AnotherProduct("Title", "Description", "Article", 123);

echo "<pre>" .
    "SimpleProduct:" . PHP_EOL .
    (new SimpleProductAdapter($product1))->getProductInfo() . PHP_EOL .
    "AnotherProduct:\n" .
    (new AnotherProductAdapter($product2))->getProductInfo() . PHP_EOL;

/**
 * Using factory for Adapters
 */

$products = [
    new SimpleProduct("Title", 123),
    new SimpleProduct2("Title", 123),
    new AnotherProduct("Title", "Description", "Article", 123),
];

foreach ($products as $product) {
    try {
        $adapter = AdapterFactory::getInstance($product);
        echo $adapter->getProductInfo();
    } catch (Exception $exception) {
        echo "<h3>" . $exception->getMessage() . "</h3>";
    }
}
