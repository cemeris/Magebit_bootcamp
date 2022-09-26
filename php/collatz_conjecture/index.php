<?php

/*
SEQUENCE
8 => 4 => 2 => 1
11 => 34 => 17 => 52 => 26 => 13 => 40 => 20 => 10 => 5 => 16 => 8 => 4 => 2 => 1
_________
TOTAL STOPING TIME
8 => 3
11 => 14
*/

/*
IDEAS
- Recursive function
- Exit rule for function will be when N = 1
- count steps
- 
*/

/*
PLAN
- write the expect autcome
- define a function
- call the function & output result
- validation for N (if N is positive integer)
- write conditions for odd and even numbers
*/

$test_values = [
    8 => 3,
    11 => 14,
    'a' => false,
    '1.4' => false,
    '2' => false,
    '-5' => false
];

$all_n = array_keys($test_values);

// function getTotalStopingTime(int $n, int $counter = 0) {
//     if ($n == 1) {
//         return [$n, $counter];
//     }

//     if ($n % 2 == 0) {
//         $n = $n /2;
//     }
//     else {
//         $n = 3 * $n + 1;
//     }

//     $result = getTotalStopingTime($n, ++$counter);
//     return $result;
// }

function getTotalStopingTime(int $n) {
    $counter = 0;
    while ($n > 1) {
        if ($n % 2 == 0) {
            $n = $n / 2;
            $counter++;
        }
        else {
            $n = (3 * $n + 1) / 2;
            $counter += 2;
        }
    }
    return $counter;
}

foreach ($test_values as $start_number => $totat_stop_time ) {
    if (!is_integer($start_number) || $start_number < 0) {
        die('wrong number');
    }
    echo $start_number . '_______' . getTotalStopingTime($start_number) . " == $totat_stop_time <br>";

}







