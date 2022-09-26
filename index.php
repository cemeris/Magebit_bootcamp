<!DOCTYPE html>
<meta charset="utf-8">
<link rel="stylesheet" href="/index.css">
<div class="wrapper">
<main>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$page_slug = str_replace('.', '', $_SERVER['REQUEST_URI']);

$path = __DIR__ . $page_slug;

if (file_exists($path)) {

    $files = scandir($path);
    $files = array_diff(scandir($path), array('.', '..', '.htaccess'));

    if (strlen($page_slug) > 1) {
    ?><div class="card home"><?php
    echo "<a href='/'>Home</a>";
    ?></div><?php
    }

    foreach($files as $file){
        if (is_dir($path . $file)) {
            ?><div class="card"><?php
            echo "<a href='" . $file . "'>$file</a>";
            ?></div><?php
        }
    }
}

?>

</main>
<footer>
    <div class="logos">
        <img src="/magebit_logo.png" alt="">
        <img src="/rcs_logo.png" alt="" style="font-size:17px">
    </div>
</footer>
</div>