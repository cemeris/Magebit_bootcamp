<?php
namespace Helpers;

class ApiHelper
{
    private $output_arr = ['status' => false];
    private $storage;

    public function __construct() {
        $this->authors = new Storage(BASE_DIR . 'authors.json');
        $this->comments = new Storage(BASE_DIR . 'comments.json');
    }

    public function add() {
        if (!$this->hasPostKey('comment_author') || !$this->hasPostKey('comment_message')) {
            $this->output_arr['message'] = 'something is not set';
            return $this;
        }

        $author_id = $this->authors->add(['author' => $_POST['comment_author']]);
        $this->comments->add([
            'comment_message' => $_POST['comment_message'],
            'author_id' => $author_id
        ]);

        $this->output_arr = [
            'status' => true,
            'message' => 'comment has been stored'
        ];

        return $this;
    }

    public function output() {
        echo json_encode($this->output_arr);
    }

    private function hasPostKey($key) {
        return (isset($_POST['comment_author']) && is_string($_POST['comment_author']));
    }
}