<?php

header('Content-Type: application/json');

define('DEBUG_MODE', true);

if (DEBUG_MODE) {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

define('DATA_FILE_NAME', 'data.json');

$data = [];
if (file_exists(DATA_FILE_NAME)) {
    $content = file_get_contents(DATA_FILE_NAME);
    $data = json_decode($content, true);
    if (!is_array($data)) {
        $data = [];
    }
}

$output = ['status' => false];

// $json = file_get_contents('php://input');
// $output['debug'] = json_decode($json);

if (
    !isset($_GET['api-name']) ||
    !is_string($_GET['api-name'])
) {
    $output['message'] = 'api-name not specified';
    echo json_encode($output, JSON_PRETTY_PRINT);
    exit;
}

switch ($_GET['api-name']) {
    case 'subscribe':
        if (
            !isset($_POST['subscriber_email']) ||
            !is_string($_POST['subscriber_email'])
        ) {
            $output['message'] = 'subscriber_email is not set';
            echo json_encode($output, JSON_PRETTY_PRINT);
            exit;
        }
        /*
        if (!array_key_exists($_POST['subscriber_email'], array_flip($data))) {
        */
        if (in_array($_POST['subscriber_email'], $data)) {
            $output['message'] = 'subscribe email already is stored';
            $output['debug'] = $_POST['subscriber_email'];
            echo json_encode($output, JSON_PRETTY_PRINT);
            exit;
        }
        
        $data[] = $_POST['subscriber_email'];
        
        $content = json_encode($data);
        file_put_contents(DATA_FILE_NAME, $content);
        $output = [
            'status' => true,
            'message' => 'subcriber email has been stored'
        ];
        break;
    case 'delete':
        // ...
        break;
    case 'get-subscribers':
        $output['status'] = true;
        $output['entries'] = $data;
        break;
    default:
        //...
}

echo json_encode($output, JSON_PRETTY_PRINT);