<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 14.03.2018
 * Time: 17:19
 */

require_once "Adapter.php";

use DesignPatterns\Adapter\{
    SimpleProduct,
    SimpleProduct2,
    AnotherProduct,
    SimpleProductAdapter,
    AnotherProductAdapter,
    AdapterFactory
};

/**
 * Simple using Adapter
 */
$product1 = new SimpleProduct("Title", 123);
$product2 = new AnotherProduct("Title", "Description", "Article", 123);

echo "<pre>".
    "SimpleProduct:" . PHP_EOL .
    (new SimpleProductAdapter($product1))->getProductInfo(). PHP_EOL .
    "AnotherProduct:\n".
    (new AnotherProductAdapter($product2))->getProductInfo() . PHP_EOL;

/**
 * Using factory for Adapters
 */

$products = [
    new SimpleProduct("Title", 123),
    new SimpleProduct2("Title", 123),
    new AnotherProduct("Title", "Description", "Article", 123),
];

foreach($products as $product) {
    try {
        $adapter = AdapterFactory::getInstance($product);
        echo $adapter->getProductInfo();
    } catch (Exception $exception) {
        echo "<h3>".$exception->getMessage()."</h3>";
    }
}