<?php


include(__DIR__ . '/classes/ApiHelper.php');
$api = new ApiHelper();

if (!isset($page) && isset($_GET['api-name']) && is_string($_GET['api-name'])) {
    header('Content-type: application/json');
    switch ($_GET['api-name']) {
        case 'get-answer':
            echo json_encode(['status' => true, 'answer' => $api->getAnswer()]);
            break;
        
        default:
            # code...
            break;
    }
}
