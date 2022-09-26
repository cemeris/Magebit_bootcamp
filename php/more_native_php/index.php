<?php

$a = 5;
display($a * 2);

$arr = [
    "name" => ["John", "alise"],
    "email" => ["john@gmail.com", "alise@gmail.com"]
];


groupByUser($arr);
display($arr);

function groupByUser(&$arr) {
    $user = [];
    $count = count($arr['name']);

    foreach ($arr as $key => $column_values) {
        for ($i = 0; $i < $count; $i++) {
            $user[$i][$key] = $column_values[$i];
        }
    }

    $arr = $user;
}

$b = 5;
$c = &$b;

$b = 3;

display($b);
display($c);

/**
DATA STORAGE
2131231412414ouo12u4: 6 | 2




VARIABLE STORAGE
$b : 2131231412414ouo12u4;
$c : 2131231412414ouo12u4;



 */

function display($content) {
    echo '<pre>' . print_r($content, true) . '</pre>';
}


function printNumbers(int $n) {
    if ($n < 1) {
        return;
    }
    display($n);
    printNumbers($n - 1);
}

printNumbers(10);