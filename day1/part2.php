<?php
// Can read numbers like "one"
function convertEngNumToDecimal(string $number): string
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

// Read inputs from text file
$iterable_input = file('input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$total = 0;
// Iterate through inputs
foreach ($iterable_input as $value) {
    // Extract the numbers
    $pattern = '/(\d|one|two|three|four|five|six|seven|eight|nine|zero)/';
    preg_match_all($pattern, $value, $matches);

    // Get the first and last number and concatenate them together
    $number = convertEngNumToDecimal($matches[0][0]) . convertEngNumToDecimal(end($matches[0]));

    // Add to the total
    $total += (int) $number;
}

echo $total;