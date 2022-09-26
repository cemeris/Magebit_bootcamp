<?php

trait Filters {
    public static function getKeyOfMaxValue(array $numbers) {
        $max = 0;
        $max_key = 0;
        foreach($numbers as $index => $number) {
            if ($number > $max) {
                $max = $number;
                $max_key = $index;
            }
        }
        return $max_key;
    }

    public static function countMatchesBetweenArrays($array1, $array2) {
        return count(array_intersect($array1, $array2));
    }
}