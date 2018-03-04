<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 03.03.2018
 * Time: 17:46
 */

require_once "Decorator.php";

use DesignPatterns\Decorator;

$simpleMessage = new Decorator\LineBreakData(
    new Decorator\SimpleMessage("Simple string")
);
echo $simpleMessage->getData();
echo $simpleMessage->getParagraphData();

$boldMessage = new Decorator\LineBreakData(
    new Decorator\BoldData(
        new Decorator\SimpleMessage("Bold string")
    )
);
echo $boldMessage->getData();
echo $boldMessage->getParagraphData();

$italicMessage = new Decorator\LineBreakData(
    new Decorator\ItalicData(
        new Decorator\SimpleMessage("Italic string")
    )
);
echo $italicMessage->getData();
echo $italicMessage->getParagraphData();

$italicBoldMessage = new Decorator\LineBreakData(
    new Decorator\ItalicData(
        new Decorator\BoldData(
            new Decorator\SimpleMessage("Italic bold string")
        )
    )
);
echo $italicBoldMessage->getData();
echo $italicBoldMessage->getParagraphData();