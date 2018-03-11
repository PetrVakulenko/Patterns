<?php
/**
 * Created by PhpStorm.
 * User: petrvakulenko
 * Date: 03.03.2018
 * Time: 17:46
 */

require_once "Decorator.php";

use DesignPatterns\Decorator\{
    SimpleMessage,
    LineBreakData,
    ItalicData,
    BoldData
};

$simpleMessage = new LineBreakData(
    new SimpleMessage("Simple string")
);
echo $simpleMessage->getData();
echo $simpleMessage->getParagraphData();

$boldMessage = new LineBreakData(
    new BoldData(
        new SimpleMessage("Bold string")
    )
);
echo $boldMessage->getData();
echo $boldMessage->getParagraphData();

$italicMessage = new LineBreakData(
    new ItalicData(
        new SimpleMessage("Italic string")
    )
);
echo $italicMessage->getData();
echo $italicMessage->getParagraphData();

$italicBoldMessage = new LineBreakData(
    new ItalicData(
        new BoldData(
            new SimpleMessage("Italic bold string")
        )
    )
);
echo $italicBoldMessage->getData();
echo $italicBoldMessage->getParagraphData();