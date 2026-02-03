<?php

if ($argc < 2) {
    echo "Usage: php converter.php <input.md>\n";
    exit(1);
}

$inputFile = $argv[1];
$outputFile = "output.html";

if (!file_exists($inputFile)) {
    echo "Error: File '$inputFile' not found.\n";
    exit(1);
}


$markdown = file_get_contents($inputFile);

$patterns = [
    '/###### (.*)/' => '<h6>$1</h6>',
    '/##### (.*)/' => '<h5>$1</h5>',
    '/#### (.*)/' => '<h4>$1</h4>',
    '/### (.*)/' => '<h3>$1</h3>',
    '/## (.*)/' => '<h2>$1</h2>',
    '/# (.*)/' => '<h1>$1</h1>',
    '/\*\*(.*?)\*\*/' => '<strong>$1</strong>',
    '/\*(.*?)\*/' => '<em>$1</em>',
    '/\[(.*?)\]\((.*?)\)/' => '<a href="$2">$1</a>'
];

$markdown = preg_replace(array_keys($patterns), array_values($patterns), $markdown);

$lines = explode("\n", $markdown);
$output = [];
$inList = false;

foreach ($lines as $line) {
    $trimmed = trim($line);
    
    if (preg_match('/^-\s+(.*)/', $trimmed, $matches)) {
        if (!$inList) {
            $output[] = '<ul>';
            $inList = true;
        }
        $output[] = '<li>' . $matches[1] . '</li>';
    } else {
        if ($inList) {
            $output[] = '</ul>';
            $inList = false;
        }
        if ($trimmed !== '') {
            $output[] = '<p>' . $line . '</p>';
        }
    }
}

if ($inList) {
    $output[] = '</ul>';
}

$html = implode("\n", $output);

$htmlTemplate = <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Markdown Preview</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 2em; line-height: 1.6; }
        h1, h2, h3 { margin-top: 1.2em; }
        ul { margin: 1em 0; padding-left: 1.5em; }
        a { color: blue; text-decoration: underline; }
    </style>
</head>
<body>
$html
</body>
</html>
HTML;

file_put_contents($outputFile, $htmlTemplate);

echo "Converted '$inputFile' to '$outputFile'.\n";
if (PHP_OS_FAMILY === 'Windows') {
    shell_exec("start $outputFile");
} elseif (PHP_OS_FAMILY === 'Darwin') {
    shell_exec("open $outputFile");
} else {
    shell_exec("xdg-open $outputFile");
}
