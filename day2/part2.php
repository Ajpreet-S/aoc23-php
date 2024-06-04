<?php
// "First iteration - brute force?"
// "Get inputs"
$gameResults = file('input.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$startTime = microtime(true);

// "Organize inputs"
// Get rid of "Game XX: " substring from each input
array_walk(
    $gameResults, fn(&$result) => $result = explode(': ', $result)[1]
);

// "Find the sum (solution)"
$sum = 0;
$colorPatterns = '/(\d?\d) (red|green|blue)/';
foreach ($gameResults as $result) {
    $leastNumOfCubesReq = [
        'red' => 0,
        'green' => 0,
        'blue' => 0,
    ];
    preg_match_all($colorPatterns, $result, $matches, PREG_SET_ORDER);

    foreach ($matches as $match) {
        $color = $match[2];
        $numOfCubes = $match[1];
        $leastNumOfCubesReq[$color] = ($numOfCubes > $leastNumOfCubesReq[$color]) ? $numOfCubes
            : $leastNumOfCubesReq[$color];
    }

    $power = $leastNumOfCubesReq['red'] * $leastNumOfCubesReq['green'] * $leastNumOfCubesReq['blue'];
    $sum += $power;
}


$endTime = microtime(true);
$totalTime = $endTime - $startTime;
echo "Sum of the power of each set: {$sum}\nExecution time: {$totalTime}ms";
