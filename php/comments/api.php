<?php

header('Content-Type: application/json');

define('BASE_DIR', __DIR__ . '/');
include(BASE_DIR . 'bootstrap.php');

if (
    !isset($_GET['api-name']) ||
    !is_string($_GET['api-name'])
) {
    echo json_encode(
        ['status' => false, 'message' => 'api-name not specified'],
        JSON_PRETTY_PRINT
    );
    exit;
}

use Helper\ApiHelper;

$api = new ApiHelper();

switch ($_GET['api-name']) {
    case 'add-comment':
        $api->add()->output();
        break;
}