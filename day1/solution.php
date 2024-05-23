<?php
// "We want the total value given the first and last digit of each input."
$total = 0;

// "First, lets read the inputs from the given input file, input.txt."
$iterableInput = file('./input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

// "Now, lets get to work and parse our inputs."
// For each input i
foreach ($iterableInput as $value) {
    // Get rid of any non digits in the line
    $regexPattern = '/\D/';
    $value = preg_replace($regexPattern, '', $value);

    // Concatenate the first and last digit (str)
    $firstDigit = $value[0];
    $lastDigit = $value[-1];
    $number = $firstDigit . $lastDigit;

    // Add the digit to the total (int)
    $total += (int) $number;
}

// Output the total
print($total);