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
    AnotherProduct,
    SimpleProductAdapter,
    AnotherProductAdapter
};

$product1 = new SimpleProduct("Title", 123);
$product2 = new AnotherProduct("Title", "Description", "Article", 123);

echo "<pre>".
    (new SimpleProductAdapter($product1))->getProductInfo().
    (new AnotherProductAdapter($product2))->getProductInfo();
