<?php

// Function to generate Lorem Ipsum text
function generateLoremIpsum($paragraphs = 3, $wordsPerParagraph = 50) {
    $loremIpsumWords = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

    $words = explode(' ', $loremIpsumWords);

    $text = '';
    for ($p = 0; $p < $paragraphs; $p++) {
        for ($w = 0; $w < $wordsPerParagraph; $w++) {
            $text .= $words[array_rand($words)] . ' ';
        }
        $text .= "\n\n";
    }

    return $text;
}

if (isset($_GET['generate'])) {
    // Get parameters from the client
    $paragraphs = isset($_GET['paragraphs']) ? intval($_GET['paragraphs']) : 3;
    $wordsPerParagraph = isset($_GET['wordsPerParagraph']) ? intval($_GET['wordsPerParagraph']) : 50;

    // Generate Lorem Ipsum text
    $loremIpsumText = generateLoremIpsum($paragraphs, $wordsPerParagraph);

    // Send appropriate headers for text content
    header('Content-Type: text/plain; charset=utf-8');

    // Output the generated Lorem Ipsum text
    echo $loremIpsumText;
    exit();
}

