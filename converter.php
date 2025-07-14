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

// Convert headings
$markdown = preg_replace('/###### (.*)/', '<h6>$1</h6>', $markdown);
$markdown = preg_replace('/##### (.*)/', '<h5>$1</h5>', $markdown);
$markdown = preg_replace('/#### (.*)/', '<h4>$1</h4>', $markdown);
$markdown = preg_replace('/### (.*)/', '<h3>$1</h3>', $markdown);
$markdown = preg_replace('/## (.*)/', '<h2>$1</h2>', $markdown);
$markdown = preg_replace('/# (.*)/', '<h1>$1</h1>', $markdown);

// Convert bold and italic
$markdown = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', $markdown);
$markdown = preg_replace('/\*(.*?)\*/', '<em>$1</em>', $markdown);

// Convert links
$markdown = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2">$1</a>', $markdown);

// Convert unordered lists
$lines = explode("\n", $markdown);
$html = "";
$inList = false;

foreach ($lines as $line) {
    if (preg_match('/^\s*-\s+(.*)/', $line, $matches)) {
        if (!$inList) {
            $html .= "<ul>\n";
            $inList = true;
        }
        $html .= "<li>{$matches[1]}</li>\n";
    } else {
        if ($inList) {
            $html .= "</ul>\n";
            $inList = false;
        }
        $html .= "<p>" . $line . "</p>\n";
    }
}
if ($inList) {
    $html .= "</ul>\n";
}

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

echo "✅ Converted '$inputFile' to '$outputFile'.\n";

// Try to open in browser (cross-platform)
if (PHP_OS_FAMILY === 'Windows') {
    shell_exec("start $outputFile");
} elseif (PHP_OS_FAMILY === 'Darwin') {
    shell_exec("open $outputFile");
} else {
    shell_exec("xdg-open $outputFile");
}
