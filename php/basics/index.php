<!DOCTYPE html>

<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<style>
    .output {
        border:2px solid grey;
        min-height:12rem;
    }
</style>

<?php

// ABC
// 
if (
    array_key_exists('a2', $_GET) &&
    is_string($_GET['a2'])
) {
    $a2 = $_GET['a2'];
}
else {
    $a2 = '';
}

if (
    array_key_exists('a3', $_GET) &&
    is_string($_GET['a3'])
) {
    $a3 = $_GET['a3'];
}
else {
    $a3 = '';
}

echo "<h2>" . $_SERVER['REQUEST_URI'] . "</h2>";
$a1 = 1;

echo $a2;

?>

<form action="">
    <input type="text" name="a2">
    <input type="text" name="a3" value="<?php echo $a3; ?>">
    <button type="submiot">submit</button>
</form>

<pre class="output">
<?php
    $array1 = [2,3,5,'a'];

    for ($i = 0; $i < count($array1); $i++) {
        echo $array1[$i];
    }

    echo "<br>";

    class FirstClass
    {
        public function get() {
            return 5;
        }
    }

    $first_obj = new FirstClass();
    $first_obj->get();


    $array2 = [2, 'second' => 3, 5, 'a'];

    foreach ($array2 as $key => $value) {
        echo $key . '==>' .  $value . '<br>';
    }

    print_r(array_flip($array2));

?>
</pre>
