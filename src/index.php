<?php

$uriParts = explode('index.php', $_SERVER['REQUEST_URI']);

$printString = '';

$listPatterns = !isset($_GET['pattern']);

if ($listPatterns) {
    foreach (glob("*") as $folderPattern) {
        if (substr_count($folderPattern, '.php') > 0) {
            continue;
        }

        foreach (glob($folderPattern) as $folder) {
            $printString .= "<a href='/index.php?pattern={$folder}'>${folder}</a><br>";
        }
    }

    echo $printString;

    exit;
}

$patternName = $_GET['pattern'];

$patternPath = __DIR__ . '/' . $patternName . '/';

$preStyle = 'style="padding: 5px; background: #dadada; border: 1px solid #888;"';
$patternCode = sprintf(
    '<pre %s>%s</pre>',
    $preStyle,
    htmlspecialchars(file_get_contents($patternPath . $patternName . '.php'))
);
$exampleCode = sprintf(
    '<pre %s>%s</pre>',
    $preStyle,
    htmlspecialchars(file_get_contents($patternPath . 'example.php'))
);

$printString = sprintf(
    '<a href="/"><< Back</a><h3>Code:</h3>%s<h3>Using example:</h3>%s<h3>Running example:</h3>',
    $patternCode,
    $exampleCode
);

echo $printString;

include_once $patternPath . 'example.php';
