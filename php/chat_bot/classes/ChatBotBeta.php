<?php

include(__DIR__ . '/ChatBotSkelet.php');
include(__DIR__ . '/Filters.php');

class ChatBotBeta extends ChatBotSkelet {
    use Filters;

    const WORDS = [
        'computer' => ['computers', 'PC', 'laptop'],
        'eat' => ['food'],
        'walk' => ['run']
    ];

    public static function getAnswer() {
        $matches_counters = [];
        $i = 0;
        foreach (parent::ANSWERS as $answer) {
            $matches_counters[$i] = Filters::countMatchesBetweenArrays($answer[1], parent::$tags) * 2;
            $unmatched_words = array_diff(parent::$tags, $answer[1]);
            $new_words_to_match = self::getAWords($unmatched_words);
            // $new_words_to_match should empty

            $second_matches = Filters::countMatchesBetweenArrays($answer[1], $new_words_to_match);

            $matches_counters[$i] = $second_matches;

            $i++;
        }


        $answer_key = Filters::getKeyOfMaxValue($matches_counters);
        return parent::ANSWERS[$answer_key][0];
    }

    private static function getAWords($unmatched_words) {
        // $unmatched_words = ['food', 'PC', 'Apple']
        // $synonim_words = ['computers', 'PC', 'laptop']
        // self::WORDS = [
        //     'computer' => ['computers', 'PC', 'laptop'],
        //     'eat' => ['food']
        // ]

        // $result_array = ['PC' => 'computer']

        $result_array = [];
        foreach ($unmatched_words as $u_word) {
            
            foreach (self::WORDS as $r_word => $synonim_words) {
                if (in_array($u_word, $synonim_words)) {
                
                    $result_array[$u_word] = $r_word;

                    break;
                }
            }
        }

        return $result_array;
    }
}