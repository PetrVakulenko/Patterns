<?php

require_once "Decorator.php";

use DesignPatterns\Decorator\SimpleMessage;
use DesignPatterns\Decorator\LineBreakData;
use DesignPatterns\Decorator\ItalicData;
use DesignPatterns\Decorator\BoldData;

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
