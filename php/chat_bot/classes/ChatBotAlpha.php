<?php

include(__DIR__ . '/ChatBotSkelet.php');
include(__DIR__ . '/Filters.php');

class ChatBotAlpha extends ChatBotSkelet {
    use Filters;

    public static function getAnswer() {
        $counters = [];
        $i = 0;
        foreach (parent::ANSWERS as $answer) {
            $counters[$i++] = Filters::countMatchesBetweenArrays($answer[1], parent::$tags);
        }

        $answer_key = Filters::getKeyOfMaxValue($counters);
        return parent::ANSWERS[$answer_key][0];
    }
}