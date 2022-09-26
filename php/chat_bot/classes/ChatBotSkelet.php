<?php
abstract class ChatBotSkelet
{
    const ANSWERS = [
        ['Eat more fruits', ['should', 'eat', 'what', 'i', 'fruits']],
        ['Go for a walk', ['what', 'should', 'we', 'do', 'walk']],
        ['Try to restart your computer', ['computer', 'your', 'restart', 'slower', 'what', 'todo']]
    ];

    protected static $tags = [];
    public static function readTags(string $str) {
        $str = str_replace("\n", ' ', $str);
        self::$tags = explode(' ', $str);
        //TODO: Empty $tags are left in self::$tags array
        // foreach (self::$tags as $key => $tag) {

        //     echo '\<'.$tag."\>"; 
        //     if ($tag == '' || $tag == ' ') {
        //         unset(self::$tags[$key]);
        //     }

        // }

        print_r(self::$tags);
    }
    abstract public static function getAnswer();
}