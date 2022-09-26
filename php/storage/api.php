<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: http://localhost:3000');


if (
    isset($_GET['api-name']) &&
    is_string($_GET['api-name']) 
) {
    switch ($_GET['api-name']) {
        case 'get-fruits':
            echo file_get_contents(__DIR__ . '/data.json');
            break;
        case 'add-fruit':
            file_put_contents(__DIR__ . '/order.json', json_encode(['fruit']));
            echo "{}";
            break;
    }

}
