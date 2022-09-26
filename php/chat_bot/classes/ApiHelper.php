<?php

include(__DIR__ . '/ChatBotBeta.php');

class ApiHelper
{
    public function getAnswer() {
        $output_str = '';
        if (isset($_GET['question']) && is_string($_GET['question'])) {

            ChatBotBeta::readTags($_GET['question']);
            $output_str .= 'Question: ' . $_GET['question'] . "?\n";
            $output_str .= 'Answer: ' . ChatBotBeta::getAnswer($_GET['question']) . "\n";
        }
        return nl2br($output_str);
    }
}