<?php

define('IMG_FILE_NAME', 'images/1.jpg');
header('Content-Type: image/jpeg');



if (!file_exists(IMG_FILE_NAME)) {
    exit;
}

if (
    isset($_GET['width']) &&
    is_string($_GET['width'])
) {
    list($width, $height, $type, $attr) = getimagesize(IMG_FILE_NAME);
    
    $new_width = (int) $_GET['width'];
    $new_height = $height / ($width/$new_width);

    $image = imagecreatefromjpeg(IMG_FILE_NAME);
    $image = imagescale($image, $new_width);
    imagejpeg($image);
    imagedestroy($image);
}





