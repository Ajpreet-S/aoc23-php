<?php
function numberReader(string $number): string
{
    return match ($number) {
        '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', => $number,
        'one' => '1',
        'two' => '2',
        'three' => '3',
        'four' => '4',
        'five' => '5',
        'six' => '6',
        'seven' => '7',
        'eight' => '8',
        'nine' => '9',
        'zero' => '0',
    };
}

// Read inputs from file
$iterable_input = file('inputTest.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// Iterate through inputs
foreach ($iterable_input as $value) {
    // Extract the first number
    $firstPattern = '/(\d)/';
    $firstDigit = preg_match($firstPattern, $value);
    exit();
}