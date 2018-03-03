<?php
/**
 * Created by PhpStorm.
 * User: Petya
 * Date: 03.03.2018
 * Time: 17:46
 */

require_once "Decorator.php";

use DesignPatterns\Decorator;

$simpleMessage = new Decorator\LineBreakMessage(
    new Decorator\Message("Simple string")
);
echo $simpleMessage->getData();

$boldMessage = new Decorator\LineBreakMessage(
    new Decorator\BoldMessage(
        new Decorator\Message("Bold string")
    )
);
echo $boldMessage->getData();

$italicMessage = new Decorator\LineBreakMessage(
    new Decorator\ItalicMessage(
        new Decorator\Message("Italic string")
    )
);
echo $italicMessage->getData();

$italicBoldMessage = new Decorator\LineBreakMessage(
    new Decorator\ItalicMessage(
        new Decorator\BoldMessage(
            new Decorator\Message("Italic bold string")
        )
    )
);

echo $italicBoldMessage->getData();