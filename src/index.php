<?php

$uriParts = explode('&', $_SERVER['REQUEST_URI']);

$folder = $uriParts[0];

if ($folder === '/') {
    foreach (glob("*") as $folderPattern) {
        if (substr_count($folderPattern, '.php') > 0) {
            continue;
        }

        foreach (glob($folderPattern) as $folder) {
            $printString .= "<a href='/{$folder}'>${folder}</a><br>";
        }
    }

    echo $printString;

    exit;
}

$patternPath = __DIR__ . '/' . $folder . '/';

if (!is_dir($patternPath)) {
    http_response_code(404);

    exit;
}

$preStyle = 'style="padding: 5px; background: #dadada; border: 1px solid #888;"';
$patternCode = sprintf(
    '<pre %s>%s</pre>',
    $preStyle,
    htmlspecialchars(file_get_contents($patternPath . $folder . '.php'))
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
