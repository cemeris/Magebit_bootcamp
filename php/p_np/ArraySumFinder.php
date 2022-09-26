<?php
class ArraySumFinder
{
    private $positions = [];

    public function find (array $arr) {
        $this->positions = [0,1];
        self::increaseKey();
    }

    public static function increaseKey () {
        
    }
}