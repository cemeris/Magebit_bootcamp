<?php

include('ArraySumFinder.php');
$np_manager = new ArraySumFinder();
$np_manager->find([1,3,4]);

$np_manager->increaseKey();
ArraySumFinder::increaseKey();

$test_value = [
    // [3, 5, 8],
    // [1, 2, 4, 7],
    // [1, 2, 4, 8, 15],
    // [1, 2, 4, 8, 16, 31]
    [3, 5, 6, -12, -10, -14],
    [3, 5, 8],
    [0, 3],
    [-1, 3, 4, 5, 8],
    [-1, 3, 7, 5, 10],
];

$checks_made = 0;
function getArraySumWithinNumbers(array $arr) {
    global $checks_made;
    $count = count($arr);
    $pos = [0, 1];

    while (true) {
        $checks_made++;
        $sum = sumValuesByKeys($pos, $arr);
        $result_arr = [];
        $match_number_arr = unsetValuesByKeys($pos, $arr);

        if (in_array($sum, $match_number_arr)) {
            $result_arr = getValuesByKeys($pos, $arr);
            $result_arr[] = $sum;
            return $result_arr;
        }

        $continue = increaseKey($pos, $count);

        if ($continue) {
            continue;
        }

        $pos_count = count($pos);
        if ($pos_count + 1 < $count) {
            for ($b = 0; $b <= $pos_count; $b++) {
                $pos[$b] = $b;
            }
            continue;
        }

        return [];
    }
}

function increaseKey(&$keys, $count) {
    $n = 0;
    $key_count = count($keys);
    for ($i = $key_count - 1; $i >= 0; $i--) {
        $n++;
        if ($keys[$i] + $n >= $count) continue;
        $keys[$i]++;
        //reset fallowing keys
        for ($m = 1; $m < $n; $m++) {
            $keys[$i + $m] = $keys[$i] + $m;
        }
        return true;

    }

    return false;
}

function getValuesByKeys(array $keys, array $arr) :array {
    $result = [];
    foreach ($keys as $key) {
        $result[] = $arr[$key];
    }
    return $result;
}

function unsetValuesByKeys($keys, $arr) {
    foreach ($keys as $key) {
        unset($arr[$key]);
    }
    return $arr;
}

function sumValuesByKeys($keys, $arr) {
    $sum = 0;
    foreach ($keys as $key) {
        $sum += $arr[$key];
    }
    return $sum;
}

foreach ($test_value as $arr) {
    $start_time = microtime(true);
    sort($arr);
    for ($i = 0; $i < 10000; $i++) {
        getArraySumWithinNumbers($arr);
    }
    echo json_encode($arr) . '<pre>'. print_r(getArraySumWithinNumbers($arr), true) . '</pre>';
    echo $checks_made . "<br>";
    $end_time = microtime(true);
    echo 'Time took to check:'.$end_time - $start_time . '<br>';
}