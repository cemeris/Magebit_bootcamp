<?php

$arr = [];

// for ($r = 0; $r <= 9; $r++) {
//     $arr[$r] = [];
//     for ($c = 0; $c <= 9; $c++) {
//         $arr[$r][$c] = $r . ',' . $c;
//     }
// }

// $coords = [0, -1];
// while (true) {
//     if (checkIfInBoundary($coords)) {
//         break;
//     }

//     if ($coords[1] == 9) {
//         $coords[0]++;
//         $coords[1] = 0;
//         $arr[$coords[0]] = [];
//     }
//     else {
//         $coords[1]++;
//     }

//     $arr[$coords[0]][$coords[1]] = $coords[0] . ',' . $coords[1];
// }


for ($r = 0, $c = 0; $r <= 9 , $c <= 9; $c++) {
    if ($c == 9 && $r < 9) {
        $c = 0;
        $r++;
    }
    if (!isset($arr[$r])) {
        $arr[$r] = [];
    }


    $arr[$r][$c] = $r . ',' . $c;
}

function checkIfInBoundary($coords) {
    $counter = 0;
    foreach($coords as $coord) {
        if ($coord == 9) {
            $counter++;
        }
    }
    if ($counter == count($coords)) {
        return true;
    }
    return false;
}

output($arr);



function output ($message) {
    echo '<pre>'. print_r($message, true) . '</pre>';
}

function recursive () {
    static $l = 0;
    if ($l++ > 100) {
        return;
    }
    recursive();
}

recursive();