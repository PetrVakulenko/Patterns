<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 26.03.18
 * Time: 12:00
 */

require_once "Strategy.php";

use DesignPatterns\Strategy\{
    AuthorizedUser,
    NullUser,
    AdministratorUser,
    StrategyContext
};

$users = [
    new AuthorizedUser("Adam",10),
    new AdministratorUser("Nick", 28),
    new NullUser(),
];
echo "<pre>";
foreach($users as $user){
    $strategy = new StrategyContext($user);
    echo "Class:" . get_class($user) . PHP_EOL;
    try {
        echo $strategy->userInfo() . PHP_EOL;
    } catch (Exception $e){
        echo $e->getMessage() . PHP_EOL;
    }
    echo PHP_EOL;
}