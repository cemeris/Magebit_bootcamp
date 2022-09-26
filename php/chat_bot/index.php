<!DOCTYPE html>

<?php
$page = 'index';
include(__DIR__ . '/classes/ApiHelper.php');
$api = new ApiHelper();
?>

<link rel="stylesheet" href="style.css">

<form action="">
    <label for="question">question</label>
    <textarea type="text" name="question" id="question" cols="40"></textarea>
    <button type="submit">submit</button>
</form>

<div class="outupt" style="margin:10px;">
    <?= $api->getAnswer(); ?>
</div>