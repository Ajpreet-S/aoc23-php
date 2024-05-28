<?php
// First iteration - brute force?

// Get the game results (inputs)
$gameResults = file('./input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// For each result, i
    // For each reveal, j
        // If roll has more than the bag should contain
            // move onto next i
    // Add game ID to the total

$id = 0;
$total = 0;

// Patterns that check if there's more cubes than a round should have
// "12 red cubes, 13 green cubes, 14 blue cubes"
$patternRed = '/([1][3-9]|[2-9]\d)\s(red)/';
$patternGreen = '/([1][4-9]|[2-9]\d)\s(green)/';
$patternBlue = '/([1][5-9]|[2-9]\d)\s(blue)/';
foreach ($gameResults as $result) {
    $id++;

    // Check reds
    if (preg_match($patternRed, $result)) {
        continue;
    }

    // Check blues
    if (preg_match($patternGreen, $result)) {
        continue;
    }

    // Check blues
    if (preg_match($patternBlue, $result)) {
        continue;
    }

    $total += $id;
}

echo $total;