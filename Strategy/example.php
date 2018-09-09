<?php

require_once "Strategy.php";

use DesignPatterns\Strategy\AuthorizedUser;
use DesignPatterns\Strategy\NullUser;
use DesignPatterns\Strategy\AdministratorUser;
use DesignPatterns\Strategy\StrategyContext;

$users = [
    new AuthorizedUser("Adam", 10),
    new AdministratorUser("Nick", 28),
    new NullUser(),
];

echo "<pre>";
foreach ($users as $user) {
    $strategy = new StrategyContext($user);
    echo "Class:" . get_class($user) . PHP_EOL;
    try {
        echo $strategy->userInfo() . PHP_EOL;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
    echo PHP_EOL;
}
