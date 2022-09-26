<?php
namespace Helpers;

use Database\DbManager;

class ApiHelper
{
    private $output_arr = ['status' => false];
    private $storage;

    public function __construct() {
        $this->todo_storage = new DbManager('todo_list');
    }
/*
class RequestValidator {
    function checkPostValue() {

    }
    function checkIfString() {
        
    }
}

*/
    public function add() {
        if (!$this->hasPostKey('task_message')) {
            $this->output_arr['message'] = 'something is not set';
            return $this;
        }

        $task_id = $this->todo_storage->add([
            'task' => $_POST['task_message'],
            'status' => 0
        ]);

        if ($task_id) {
            $this->output_arr = [
                'status' => true,
                'id' => $task_id,
                'message' => 'task has been saved'
            ];
        }
        else {
            $this->output_arr = [
                'status' => false,
                'message' => 'task has not been saved'
            ];
            if (DEBUG_MODE) {
                $this->output_arr['debug'] = $this->todo_storage->getErrorMessage();
            } 
        }

        return $this;
    }

    public function getAll() {
        $entries = $this->todo_storage->getAll();
        $this->output_arr = [
            'status' => true,
            'entries' => $entries,
            'message' => 'all entries where recived'
        ];
        return $this;
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
            $this->output_arr = [
                'status' => false,
                'message' => 'uncorect method used for a request'
            ];
            return $this;
        }
        if (!$this->isGetValueString('id')) {
            $this->output_arr = [
                'status' => false,
                'message' => 'no id submited'
            ];
            return $this;
        }
        $id = $_GET['id'];

        if($this->todo_storage->delete($id)) {
            $this->output_arr = [
                'status' => true,
                'message' => 'task has been deleted'
            ];
        }
        else {
            $this->output_arr = [
                'status' => false,
                'message' => 'deletion failed'
            ];
        }

        return $this;
    }

    public function output() {
        echo json_encode($this->output_arr);
    }

    private function hasPostKey($key) {
        return (isset($_POST[$key]) && is_string($_POST[$key]));
    }
    private function isGetValueString($key) {
        return (isset($_GET[$key]) && is_string($_GET[$key]));
    }
}