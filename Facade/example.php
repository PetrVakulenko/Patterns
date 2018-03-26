<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 26.03.18
 * Time: 13:55
 */

require_once "Facade.php";

use DesignPatterns\Facade\FacadeSession;

$session = new FacadeSession("username", "password");

var_dump($session->getUserData());